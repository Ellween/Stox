@extends('user.home')


@section('personal')
    <div class="container-fluid">
        <div class="row">
            <div class="personal_bg w-100" style='height: 100vh'>
                @include('user.include.head_nav')
                <div class="container">
                    <div class="row" style ='width: 100%; margin: 0 auto;'>
                        <div class="my_broker">
                            <h1>My Broker</h1>
                        </div>
                        <div class="brokers">
                            <ul>
                                <li><img src="/images/broker-img.svg" alt=""></li>
                                <li><p>Aetos Capital</p></li>
                                <li><button>Register Now</button></li>
                                <li><button>Home Page</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection