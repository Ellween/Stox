@extends('user.home')


@section('personal')
    <div class="container-fluid">
        <div class="row">
            <div class="personal_bg w-100">
                @include('user.include.head_nav')
                <div class="container">
                    <div class="row" style ='width: 100%; margin: 0 auto;'>
                        <div class="personal_info">
                            <div class="personal_info_header">
                                <h1>Personal Information</h1>
                                <p>We provide the solution for asset management</p>
                            </div>
                            <div class="personal_info_form">
                                <div class="personal_inputs">
                                    <input disabled='true' type="text" value = {{ Session::get('data')['name'] }} class='form-control'>
                                    <input disabled='true' type="text" value = {{ Session::get('data')['last_name'] }} class='form-control'>
                                    <input disabled='true' type="text" value = "{{ Session::get('data')['country'] }}" class='form-control'>
                                    <input disabled='true' type="text" value = {{ Session::get('data')['phone'] }} class='form-control'>
                                </div>
                                <div class="man_img">
                                    <img src="/images/Frame.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection