<tr class='table-tr'>
    <th>{{ $glossary->id }}</th>
    <th>{{ $glossary->title }}</th>
    <td>{!! substr($glossary->text,0,50) !!}
        {{ strlen($glossary->text) > 50 ? "...":" " }}
    </td>
    <td class='actions'>
        <a href="{{ route('update_glossary', ['id' => $glossary->id])}}" class=""><i class="far fa-edit"></i></a>
        <a href="{{ route('update_glossary', ['id' => $glossary->id])}}" class=""><i class="fas fa-trash"></i></a>
        <a href="{{ route('update_glossary', ['id' => $glossary->id])}}" class="" data-toggle="modal" data-target="#ViewModal"><i class="far fa-eye"></i></a>
    </td>
</tr>

{{-- 
<div class="glossary_items d-flex">
        <div class="glossary_title">
           
        </div>
        -
        <div class="glossary_text">
            <strong></strong> 
        </div>

        <div class="edit_delete_item d-flex">
            <a href='{{route('glossary_page')}}'><i class="far fa-edit"></i></a>
            <a href='#'><i class="fas fa-trash"></i></a>
        </div>
    </div> --}}