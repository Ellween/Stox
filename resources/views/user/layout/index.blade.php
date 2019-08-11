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
                                    <input type="text" value = "First Name" class='form-control'>
                                    <input type="text" value = "Last Name" class='form-control'>
                                    <input type="text" value = "Country" class='form-control'>
                                    <input type="text" value = "Contact Number" class='form-control'>
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