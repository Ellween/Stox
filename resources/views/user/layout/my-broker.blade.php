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
                                <a href ='https://www.aetoscg.com/12030578-E00'><li><button>Register Now</button></li></a>
                                <a href='https://www.aetoscg.com/en'><li><button>Home Page</button></li></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection