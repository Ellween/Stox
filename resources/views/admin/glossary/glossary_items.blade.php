<tr class='table-tr' table-id={{ $glossary->id }}>
    <th class='glossary_id'>{{ $glossary->id }}</th>
    <th class='glossary_title'>{{ $glossary->title }}</th>
    <td class='glossary_text'>{!! substr($glossary->text,0,80) !!}
        {{ strlen($glossary->text) > 80 ? "...":" " }}
    </td>
    <td class='actions'>
        <a id = {{ $glossary->id }} class="edit_glossary" data-toggle="modal" data-target="#EditModal"><i class="far fa-edit"></i></a>
        <a id = {{ $glossary->id }} class="delete_glossary" ><i class="fas fa-trash"></i></a>
        <a id = {{ $glossary->id }} class="view_glossary" data-toggle="modal" data-target="#ViewModal"><i class="far fa-eye"></i></a>
    </td>
</tr>




   