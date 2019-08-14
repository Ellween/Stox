@extends('user.home')


@section('personal')
    <div class="container-fluid">
        <div class="row">
            <div class="personal_bg w-100" style=''>
                @include('user.include.head_nav')
                <div class="container">
                    <div class="row" style ='width: 100%; margin: 0 auto;'>
                        <div class="my_broker">
                            <h1>Economic Calendar</h1>
                        </div>
                        <div class="realtime_chart mt-4 w-100" style ='margin-left: 80px;'>
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://uk.tradingview.com/markets/currencies/economic-calendar/" rel="noopener" target="_blank"><span class="blue-text">Economic Calendar</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
                                {
                                "colorTheme": "light",
                                "isTransparent": false,
                                "width": "100%",
                                "height": "600",
                                "locale": "uk",
                                "importanceFilter": "-1,0,1"
                            }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection