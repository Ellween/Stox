@extends('user.home')


@section('personal')
    <div class="container-fluid">
        <div class="row">
            <div class="personal_bg w-100" style=''>
                @include('user.include.head_nav')
                <div class="container">
                    <div class="row" style ='width: 100%; margin: 0 auto;'>
                        <div class="my_broker">
                            <h1>Realtime Chart</h1>
                        </div>
                        <div class="realtime_chart mt-4 w-100" style ='margin-left: 80px;'>
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div id="tradingview_39432"></div>
                                <div class="tradingview-widget-copyright"><a href="https://uk.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                <script type="text/javascript">
                                new TradingView.widget(
                                {
                                    "width": '100%',
                                    "height": 610,
                                    "symbol": "NASDAQ:AAPL",
                                    "interval": "D",
                                    "timezone": "Etc/UTC",
                                    "theme": "Light",
                                    "style": "1",
                                    "locale": "uk",
                                    "toolbar_bg": "#f1f3f6",
                                    "enable_publishing": false,
                                    "allow_symbol_change": true,
                                    "container_id": "tradingview_39432"
                                }
                                );
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