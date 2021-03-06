import { Fun } from '@ephox/katamari';

import * as AlloyEvents from '../../api/events/AlloyEvents';
import * as NativeEvents from '../../api/events/NativeEvents';
import * as DomModification from '../../dom/DomModification';
import { UnselectingConfig } from '../../behaviour/unselecting/UnselectingTypes';
import { EventFormat } from '../../events/SimulatedEvent';

const exhibit = (base: { }, unselectConfig: UnselectingConfig): { } => {
  return DomModification.nu({
    styles: {
      '-webkit-user-select': 'none',
      'user-select': 'none',
      '-ms-user-select': 'none',
      '-moz-user-select': '-moz-none'
    },
    attributes: {
      unselectable: 'on'
    }
  });
};

const events = (unselectConfig: UnselectingConfig): AlloyEvents.AlloyEventRecord => {
  return AlloyEvents.derive([
    AlloyEvents.abort(NativeEvents.selectstart(), Fun.constant(true))
  ]);
};

export {
  events,
  exhibit
};