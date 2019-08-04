@extends('base')

@section('content')
    <div class='main-content-head'>
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
    </div>
    <div class="container" style ='max-width:1263px'>
        <div class="row">
            <div class="partners-detail">
                <div class="partners-head">
                    <h1>{{ $single_page->title }}</h1>
                </div>

                <div class="partners-content-1">
                    {{--  <div class="content-1-header">
                        <h2>{{ $page->title }}</h2>
                    </div>  --}}
                    <div class="content-1-body">
                        <div class='img_header'>
                            {!! $single_page->content !!}
                        </div>
                    </div>
                </div>



                {{--  <div class="partners-content-1">
                    <div class="content-1-header">
                        <h2>Personal Education</h2>
                    </div>
                    <div class="content-1-body">
                        <img src="/images/brain.svg" alt="">
                        <div class='img_header'>
                            <h4>On Stoxtrades, beside account manager, you can get personal tutor, 
                                which will provide educational sessions about financial market and trading platform, 
                                personally for you.
                            </h4>
                            <p>In this training you will find easy-to-understand information on how trading works, 
                                fundamental and technical analysis, simple explanations on 
                                technical indicators and key components you will need to get started.
                            </p>
                        </div>
                        
                    </div>
                </div>  --}}
                {{--  <div class="partners-content-2">
                    <div class="content-2-header">
                        <h2>Trading Strategy</h2>
                    </div>
                    <div class="content-2-body">
                        <img src="/images/computer.svg" alt="">
                        <div class='img_header'>
                            <h4>Following market is crucial part for traders, for more efficiency you have to know how to analyze 
                                information correctly and when will be right time for investing in different assets.
                            </h4>
                            <p> We will help you to create you own trading strategy and 
                                will teach you how to manage your funds in the trades. 
                            </p>
                        </div>
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
@endsection 