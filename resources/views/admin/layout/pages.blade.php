@extends('main')


@section('main-admin')

        {{-- {{ dd(strpos(Route::currentRouteName(), 'admin_yle') == 0)}}  --}}

    <div class ='p-3'>
        <div class="body-header">
                <button><i class="fas fa-plus" style ='padding-right: 10px;'></i>Add Pages</button>
        </div>
            <hr style ='margin-bottom: 0;'>
            <div class ='user-search'>
                <p>120 <span>Records on the Site</span></p>
                <div class ='d-flex align-items-center'>
                    <label>Search</label><input type="text" class='form-control'>
                </div>
            </div>
            <div class="user-tables">
                <h1>yle</h1>
            </div>
    </div>
@endsection
