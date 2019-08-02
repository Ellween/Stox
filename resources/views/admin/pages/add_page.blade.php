@extends('main')


@section('main-admin')

        {{-- {{ dd(strpos(Route::currentRouteName(), 'admin_yle') == 0)}}  --}}

    <div class ='p-3'>
        <div class="body-header">
            Create New Page
        </div>
            <hr style ='margin-bottom: 0;'>
            <div class ='user-search'>
                <div class ='d-flex align-items-center'>
                </div>
            </div>
            <div class="user-tables">
                <div class="form-table">
                    <form action="">
                        <div class="page_title">
                            <label for="">Page Title</label>
                            <input type="text" class='form-control' placeholder="Page Title">
                        </div>
                        <div class="page_content">
                            <label for="">Page Content</label>
                            <textarea name="" id="" cols="30" rows="10" class='form-control'></textarea>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection
