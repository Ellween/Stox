@extends('main')


@section('main-admin')
    <div class ='p-3'>
        <div class="body-header">
                <button><i class="fas fa-plus" style ='padding-right: 10px;'></i>Add user</button>
        </div>
            <hr style ='margin-bottom: 0;'>
            <div class ='user-search'>
                <p>120 <span>Records on the Site</span></p>
                <div class ='d-flex align-items-center'>
                    <label>Search</label><input type="text" class='form-control'>
                </div>
            </div>
            <div class="user-tables">
                <table>
                    <tr>
                        <th>User</th>
                        <th>Position</th>
                        <th>Email</th>
                    </tr>

                    @foreach ($users as $users)
                    <tr>
                        <td>{{$users->name}}</td>
                        <td>
                            @if($users->type == 2)
                            Admin
                            @else 
                                Default User
                            @endif
                        </td>
                        <td>{{$users->email}}</td>
                        @if($users->type != 2)
                            <form   action="/user_delete/{{$users->id}}" method= "POST">
                                @csrf
                                    <td style ='border:none !important; width: 1% !important;' id = {{$users->id}}><button class ='btn btn-danger delete_user'>Delete</button></td>
                            </form>
                        @else 

                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
    </div>
@endsection
