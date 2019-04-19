<nav class="navbar" style="background-color: #fafafa;">
    <div class="container-fluid">
        <div class="row ticker">
            <div class="col-xs-1 visible-xs logo" align="center">
                <img src="{{url()}}/assets/img/lt_middle_logo.png" class="LSC-logo">
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-10 scroll-text">
                <marquee>
                    Welcome to LSC
                </marquee>
            </div>
            <div class="col-xs-1 visible-xs notification-xs" align="center">
            </div>
        </div>
        <div class="row navigation">
            <div class="col-md-1 col-lg-1 col-sm-1 visible-lg visible-md visible-sm logo" align="center">
                <img src="{{url()}}/assets/img/lt_middle_logo.png" class="LSC-logo">
            </div>
            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" id="list-container">
                <div class="row">
                    <div class="col-md-1 col-lg-1 col-sm-1 col-xs-2 arrow-div text-center">
                        <button type="button" id="arrowL" class="btn btn-circle">
                            <i class="material-icons">keyboard_arrow_left</i>
                        </button>
                    </div>
                    <div class="col-md-10 col-lg-10 col-sm-10 col-xs-8" id="list-container">
                        <div class='list row'>
                            @if(Session::get('userType')=='supplier')
                                
                                <a class="item" href="{{url()}}/supplier/dashboard">
                                    <img src="{{url()}}/assets/img/overview_active.svg" alt="overview">
                                    <small class="{{ $NAVBAR_NAME == 'DASHBOARD' ? 'active': '' }}">{{ $sidedata['home'] }}</small>
                                </a>
                                <a class="item" onclick="ga('send', 'event', '{{$page_name}}', 'click', '{{$sidedata['order_status']}}')" href="{{url()}}/supplier/orderStatus">
                                    <img src="{{url()}}/assets/vendor/icons/new_navbar/order-status.svg" alt="orderstatus" width="24" height="21">
                                    <small class="{{ $NAVBAR_NAME == 'ORDERSTATUS' ? 'active': '' }}">{{ $sidedata['order_status'] }}</small>
                                </a>
                                <a class="item" href="{{url()}}/supplier/mis">
                                   <img src="{{url()}}/assets/vendor/icons/new_navbar/predict.svg" alt="mis" width="24" height="21">
                                    <small class="{{ $NAVBAR_NAME == 'MIS' ? 'active': '' }}">{{ $sidedata['mis'] }}</small>
                                </a>
                                <!--<a class="item" href="#">
                                    <img src="{{url()}}/assets/img/productivity_active.svg" alt="productivity">
                                    <small class="{{ $NAVBAR_NAME == 'PRODUCTIVITY' ? 'active': '' }}">PRODUCTIVITY</small>
                                </a>
                                <a class="item" href="#">
                                    <img src="{{url()}}/assets/img/championship_active.svg" alt="championship">
                                    <small class="{{ $NAVBAR_NAME == 'CHAMPIONSHIP' ? 'active': '' }}">CHAMPIONSHIP</small>
                                </a>-->
                                <a class="item" href="{{url()}}/supplier/gamecard">
                                    <img class="rewards_img" src="{{url()}}/assets/img/rewards_active.svg" alt="gamecard">
                                    <small class="{{ $NAVBAR_NAME == 'GAMECARD' ? 'active': '' }}">{{ $sidedata['game_card'] }}</small>
                                </a>

                                <a class="item" onclick="ga('send', 'event', '{{$page_name}}', 'click', '{{$sidedata['leaderboard']}}')" href="{{url()}}/supplier/leaderboard?type=oce">
                                    <img src="{{url()}}/assets/img/leaderboard_active.svg" alt="leaderboard">
                                    <small class="{{ $NAVBAR_NAME == 'LEADERBOARD' ? 'active': '' }}">{{ $sidedata['leaderboard'] }}</small>
                                </a>
                                <a class="item" href="{{url()}}/supplier/profile">
                                    <img class="profile_img" src="{{url()}}/assets/img/profile_active.svg" alt="profile">
                                    <small class="{{ $NAVBAR_NAME == 'PROFILE' ? 'active': '' }} profile">{{ $sidedata['profile'] }}</small>
                                </a>
                            @else
                                <a class="item" href="{{url()}}/buyer/dashboard">
                                    <img src="{{url()}}/assets/img/overview_active.svg" alt="overview">
                                    <small class="{{ $NAVBAR_NAME == 'DASHBOARD' ? 'active': '' }}">{{ $sidedata['home'] }}</small>
                                </a>
                                <a class="item" onclick="ga('send', 'event', '{{$page_name}}', 'click', '{{$sidedata['order_status']}}')" href="{{url()}}/buyer/orderStatusScreen">
                                    <img src="{{url()}}/assets/vendor/icons/new_navbar/order-status.svg" alt="orderstatus" width="24" height="21">
                                    <small class="{{ $NAVBAR_NAME == 'ORDERSTATUS' ? 'active': '' }}">{{ $sidedata['order_status'] }}</small>
                                </a>
                                <a class="item" href="{{url()}}/buyer/mis">
                                   <img src="{{url()}}/assets/vendor/icons/new_navbar/predict.svg" alt="mis" width="24" height="21">
                                    <small class="{{ $NAVBAR_NAME == 'MIS' ? 'active': '' }}">{{ $sidedata['mis'] }}</small>
                                </a>
                                <!--<a class="item" href="#">
                                    <img src="{{url()}}/assets/img/productivity_active.svg" alt="productivity">
                                    <small class="{{ $NAVBAR_NAME == 'PRODUCTIVITY' ? 'active': '' }}">PRODUCTIVITY</small>
                                </a>

                                <a class="item" href="#">
                                    <img src="{{url()}}/assets/img/championship_active.svg" alt="championship">
                                    <small class="{{ $NAVBAR_NAME == 'CHAMPIONSHIP' ? 'active': '' }}">CHAMPIONSHIP</small>
                                </a>-->
                                @if(Session::get('show_mg_link'))
                                <a class="item" onclick="ga('send', 'event', '{{$page_name}}', 'click', '{{$sidedata['pu_dashboard']}}')" href="{{ url() }}/MG/redirect_to_mg">
                                    <img class="swap_horiz_img" src="{{url()}}/assets/img/swap_horiz.png" alt="pu_dashboard">
                                    <small class="">{{ $sidedata['pu_dashboard'] }}</small>
                                </a>
                                @endif

                                <a class="item" href="{{url()}}/buyer/gamecard">
                                    <img class="rewards_img" src="{{url()}}/assets/img/rewards_active.svg" alt="gamecard">
                                    <small class="{{ $NAVBAR_NAME == 'GAMECARD' ? 'active': '' }}">{{ $sidedata['game_card'] }}</small>
                                </a>

                                <a class="item" onclick="ga('send', 'event', '{{$page_name}}', 'click', '{{$sidedata['leaderboard']}}')" href="{{url()}}/buyer/leaderboard?type=oce">
                                    <img src="{{url()}}/assets/img/leaderboard_active.svg" alt="leaderboard">
                                    <small class="{{ $NAVBAR_NAME == 'LEADERBOARD' ? 'active': '' }}">{{ $sidedata['leaderboard'] }}</small>
                                </a>

                                <a class="item" href="{{url()}}/buyer/profile">
                                    <img class="profile_img" src="{{url()}}/assets/img/profile_active.svg" alt="profile">
                                    <small class="{{ $NAVBAR_NAME == 'PROFILE' ? 'active': '' }} profile">{{ $sidedata['profile'] }}</small>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-1 col-lg-1 col-sm-1 col-xs-2 arrow-div text-center">
                        <button type="button" id="arrowR" class="btn btn-circle">
                            <i class="material-icons">keyboard_arrow_right</i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-1 visible-lg visible-md visible-sm notifications collapse navbar-collapse" align="center" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
 		    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" style="">
                            <img src="{{url()}}/assets/img/Bell_icon.svg" class="material-icons">
                            @if($sidedata['count'] == 0)
                                <span class=""></span>
                            @else
                                <span class="label-count">{{ $sidedata['count'] }}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    @if( count($sidedata['notification_data']) > 0)
                                        @foreach($sidedata['notification_data'] as $key => $value)
                                        <li class="notification" data-attr="{{$value ->category}}" date-info="{{ $value -> date }}" data-id="{{$value->id}}">
                                            <div class="date">
                                            {{ $value -> date }}
                                            </div>
                                            <a href="#">
                                                <div class="menu-info">
                                                    <h4>{{ $value->notif_text }}</h4>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                    @else
                                        <div class="no_notifications">No new notification found</div>
                                    @endif
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);" class=" waves-effect waves-block"></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
