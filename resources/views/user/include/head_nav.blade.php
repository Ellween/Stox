<div class="container">
    <div class="row">
        <div class="header_nav">
            <ul>
                <a href ='{{ route('user_dashboard') }}'><li class='{{ (\Request::route()->getName() == 'user_dashboard') ? 'opacity' : '' }}'>Personal Info</li></a>
                <a href ='{{ route('my-broker') }}'><li class='{{ (\Request::route()->getName() == 'my-broker') ? 'opacity' : '' }}'>My Broker</li></a>
                <a href ='{{ route('real_time_chart') }}'><li class='{{ (\Request::route()->getName() == 'real_time_chart') ? 'opacity' : '' }}'>Realtime Chart</li></a>
                <a href ='{{ route('economic_calendar') }}'><li class='{{ (\Request::route()->getName() == 'economic_calendar') ? 'opacity' : '' }}'>Economic Calendar </li></a>
            </ul>
        </div>
    </div>
</div>