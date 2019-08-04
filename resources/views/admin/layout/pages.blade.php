@extends('main')


@section('main-admin')

        {{-- {{ dd(strpos(Route::currentRouteName(), 'admin_yle') == 0)}}  --}}

    <div class ='p-3'>
        <div class="body-header">
        <a href="{{route('add_page')}}"><button><i class="fas fa-plus" style ='padding-right: 10px;'></i>Add Pages</button></a>
        </div>
            <hr style ='margin-bottom: 0;'>
            <div class ='user-search'>
                <div class ='d-flex align-items-center'>
                </div>
            </div>
            <div class="user-tables">
                <div class="glossary_cont d-flex align-items-center">
                    <div class="glossary">
                        Glossary
                    </div>
                   
                    <div class="edit_delete d-flex">
                        <a href='{{route('glossary_page')}}'><i class="far fa-edit"></i></a>
                    </div>
                </div>
                @foreach ($pages as $page)
                <div class="pages d-flex mt-3">
                  
                    <div class="glossary">
                        <div>{{ $page->title }}</div>
                    </div>
                    <div class="edit_delete d-flex align-items-center">
                        <a href="{{route('get_single',['id' =>  $page->slug ])}}"><i class="far fa-edit"></i></a>
                        <form action="{{ route('delete_page',['id' => $page->id ])}}" method="POST">
                            @csrf
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>
                    </div>
                   
                </div>
                @endforeach
            </div>
    </div>
@endsection
