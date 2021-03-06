import { Adt, Arr, Fun, Merger, Obj, Option, Result, Thunk, Type } from '@ephox/katamari';

import * as FieldPresence from '../api/FieldPresence';
import * as Objects from '../api/Objects';
import { ResultCombine } from '../combine/ResultCombine';
import { fieldAdt, TypeProcessorAdt, FieldProcessorAdt, typeAdt } from '../format/TypeTokens';
import * as ObjReader from './ObjReader';
import * as ObjWriter from './ObjWriter';
import * as SchemaError from './SchemaError';
import { SimpleResult } from '../alien/SimpleResult';

// TODO: Handle the fact that strength shouldn't be pushed outside this project.
export type ValueValidator = (a, strength?: () => any) => SimpleResult<string, any>;
export type PropExtractor = (path: string[], strength, val: any) => SimpleResult<any, any>;
export type ValueExtractor = (label: string, prop: Processor, strength: () => any, obj: any) => SimpleResult<any, string>;
export interface Processor {
  extract: PropExtractor;
  toString: () => string;
  toDsl: () => TypeProcessorAdt;
}

export type FieldValueProcessor = (key: string, okey: string, presence: FieldPresence.FieldPresenceAdt, prop: Processor) => FieldProcessorAdt;
export type StateValueProcessor = <T>(okey: string, instantiator) => T;

export interface ValueProcessorAdt extends Adt {
  fold: (FieldValueProcessor, StateValueProcessor) => any;
}

export interface ValueProcessor {
  field: FieldValueProcessor;
  state: StateValueProcessor;
}

// data ValueAdt = Field fields | state
const adt = Adt.generate([
  { field: [ 'key', 'okey', 'presence', 'prop' ] },
  { state: [ 'okey', 'instantiator' ] }
]) as ValueProcessor;

const output = function (okey, value): ValueProcessorAdt {
  return adt.state(okey, Fun.constant(value));
};

const snapshot = function (okey): ValueProcessorAdt {
  return adt.state(okey, Fun.identity);
};

const strictAccess = function (path, obj, key) {
  // In strict mode, if it undefined, it is an error.
  return ObjReader.readOptFrom(obj, key).fold(function () {
    return SchemaError.missingStrict(path, key, obj);
  }, SimpleResult.svalue);
};

const fallbackAccess = function (obj, key, fallbackThunk) {
  const v = ObjReader.readOptFrom(obj, key).fold(function () {
    return fallbackThunk(obj);
  }, Fun.identity);
  return SimpleResult.svalue(v);
};

const optionAccess = function (obj, key) {
  return SimpleResult.svalue(ObjReader.readOptFrom(obj, key));
};

const optionDefaultedAccess = function (obj, key, fallback) {
  const opt = ObjReader.readOptFrom(obj, key).map(function (val) {
    return val === true ? fallback(obj) : val;
  });
  return SimpleResult.svalue(opt);
};

const cExtractOne = function (path, obj, field, strength) {
  return field.fold(
    function (key, okey, presence, prop) {
      const bundle = function (av) {
        const result = prop.extract(path.concat([ key ]), strength, av);
        return SimpleResult.map(result, (res) => {
          return ObjWriter.wrap(okey, strength(res));
        });
      };

      const bundleAsOption = function (optValue) {
        return optValue.fold(function () {
          const outcome = ObjWriter.wrap(okey, strength(Option.none()));
          return SimpleResult.svalue(outcome);
        }, function (ov) {
          const result: SimpleResult<any, any> = prop.extract(path.concat([ key ]), strength, ov);
          return SimpleResult.map(result, function (res) {
            return ObjWriter.wrap(okey, strength(Option.some(res)));
          });
        });
      };

      return (function () {
        return presence.fold(function () {
          return SimpleResult.bind(
            strictAccess(path, obj, key),
            bundle
          );
        }, function (fallbackThunk) {
          return SimpleResult.bind(
            fallbackAccess(obj, key, fallbackThunk),
            bundle
          );
        }, function () {
          return SimpleResult.bind(
            optionAccess(obj, key),
            bundleAsOption
          );
        }, function (fallbackThunk) {
          // Defaulted option access
          return SimpleResult.bind(
            optionDefaultedAccess(obj, key, fallbackThunk),
            bundleAsOption
          )
        }, function (baseThunk) {
          const base = baseThunk(obj);
          const result = SimpleResult.map(
            fallbackAccess(obj, key, Fun.constant({})),
            (v) => {
              return Merger.deepMerge(base, v);
            }
          )
          return SimpleResult.bind(result, bundle);
        });
      })();
    },
    function (okey, instantiator) {
      const state = instantiator(obj);
      return SimpleResult.svalue(ObjWriter.wrap(okey, strength(state)));
    }
  );
};

const cExtract = function (path, obj, fields, strength) {
  const results = Arr.map(fields, function (field) {
    return cExtractOne(path, obj, field, strength);
  });

  return ResultCombine.consolidateObj(results, {});
};

const value = function (validator: ValueValidator): Processor {
  const extract = function (path, strength, val) {
    return SimpleResult.bindError(
      // NOTE: Intentionally allowing strength to be passed through internally
      validator(val, strength),
      function (err) {
        return SchemaError.custom(path, err);
      }
    );
  };

  const toString = function () {
    return 'val';
  };

  const toDsl = function () {
    return typeAdt.itemOf(validator);
  };

  return {
    extract,
    toString,
    toDsl
  };
};

// This is because Obj.keys can return things where the key is set to undefined.
const getSetKeys = function (obj) {
  const keys = Obj.keys(obj);
  return Arr.filter(keys, function (k) {
    return Objects.hasKey(obj, k);
  });
};

const objOfOnly = function (fields: ValueProcessorAdt[]): Processor {
  const delegate = objOf(fields);

  const fieldNames = Arr.foldr(fields, function (acc, f: ValueProcessorAdt) {
    return f.fold(function (key) {
      return Merger.deepMerge(acc, Objects.wrap(key, true));
    }, Fun.constant(acc));
  }, { });

  const extract = function (path, strength, o) {
    const keys = Type.isBoolean(o) ? [ ] : getSetKeys(o);
    const extra = Arr.filter(keys, function (k) {
      return !Objects.hasKey(fieldNames, k);
    });

    return extra.length === 0  ? delegate.extract(path, strength, o) :
      SchemaError.unsupportedFields(path, extra);
  };

  return {
    extract,
    toString: delegate.toString,
    toDsl: delegate.toDsl
  };
};

const objOf = function (fields: FieldProcessorAdt[]): Processor {
  const extract = function (path, strength, o) {
    return cExtract(path, o, fields, strength);
  };

  const toString = function () {
    const fieldStrings = Arr.map(fields, function (field) {
      return field.fold(function (key, okey, presence, prop) {
        return key + ' -> ' + prop.toString();
      }, function (okey, instantiator) {
        return 'state(' + okey + ')';
      });
    });
    return 'obj{\n' + fieldStrings.join('\n') + '}';
  };

  const toDsl = function () {
    return typeAdt.objOf(
      Arr.map(fields, function (f) {
        return f.fold(function (key, okey, presence, prop) {
          return fieldAdt.field(key, presence, prop);
        }, function (okey, instantiator) {
          return fieldAdt.state(okey);
        });
      })
    );
  };

  return {
    extract,
    toString,
    toDsl
  };
};

const arrOf = function (prop: Processor): Processor {
  const extract = function (path, strength, array) {
    const results = Arr.map(array, function (a, i) {
      return prop.extract(path.concat(['[' + i + ']' ]), strength, a);
    });
    return ResultCombine.consolidateArr(results);
  };

  const toString = function () {
    return 'array(' + prop.toString() + ')';
  };

  const toDsl = function () {
    return typeAdt.arrOf(prop);
  };

  return {
    extract,
    toString,
    toDsl
  };
};

const setOf = function (validator: ValueValidator, prop: Processor): Processor {
  const validateKeys = function (path, keys) {
    return arrOf(value(validator)).extract(path, Fun.identity, keys);
  };
  const extract = function (path, strength, o) {
    //
    const keys = Obj.keys(o);
    const validatedKeys = validateKeys(path, keys);
    return SimpleResult.bind(validatedKeys, function (validKeys) {
      const schema = Arr.map(validKeys, function (vk) {
        return adt.field(vk, vk, FieldPresence.strict(), prop);
      });

      return objOf(schema).extract(path, strength, o);
    });
  };

  const toString = function () {
    return 'setOf(' + prop.toString() + ')';
  };

  const toDsl = function () {
    return typeAdt.setOf(validator, prop);
  };

  return {
    extract,
    toString,
    toDsl
  };
};

// retriever is passed in. See funcOrDie in ValueSchema
const func = function (args: string[], schema: Processor, retriever): Processor {
  const delegate = value(function (f, strength) {
    return Type.isFunction(f) ? SimpleResult.svalue<any, () => any>(function () {
      const gArgs = Array.prototype.slice.call(arguments, 0);
      const allowedArgs = gArgs.slice(0, args.length);
      const o = f.apply(null, allowedArgs);
      return retriever(o, strength);
    }) : SimpleResult.serror('Not a function');
  });

  return {
    extract: delegate.extract,
    toString () {
      return 'function';
    },
    toDsl () {
      return typeAdt.func(args, schema);
    }
  };
};

const thunk = function (desc: string, processor: () => Processor): Processor {
  const getP = Thunk.cached(function () {
    return processor();
  });

  const extract = function (path, strength, val) {
    return getP().extract(path, strength, val);
  };

  const toString = function () {
    return getP().toString();
  };

  const toDsl = function () {
    return typeAdt.thunk(desc);
  };

  return {
    extract,
    toString,
    toDsl
  };
};

const anyValue = Fun.constant(value(SimpleResult.svalue));
const arrOfObj = Fun.compose(arrOf, objOf);

const state = adt.state;
const field = adt.field;

export {
  anyValue,
  value,

  objOf,
  objOfOnly,
  arrOf,
  setOf,
  arrOfObj,

  state,
  field,
  output,
  snapshot,
  thunk,
  func
};
