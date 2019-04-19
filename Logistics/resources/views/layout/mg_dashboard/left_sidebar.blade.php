<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar closed">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{url()}}/assets/mg_dashboard/images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Session::get('first_name')}}</div>
            <div class="email">{{Session::get('userEmail')}}</div>
            <!-- <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color: #fff;">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="{{url()}}/vault/logout"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div> -->
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="MG_HOME {{ $page == 'MG_HOME' ? 'active' : ''}}">
                <a href="{{url()}}/MG/dashboard">
                    <i class="material-icons">home</i>
                    <span>{{ $dashboardData['home'] }}</span>
                </a>
            </li>
            <li class="MG_OTD {{ $page == 'MG_OTD' ? 'active' : ''}}">
                <a href="{{url()}}/MG/otd_performance?&pu_id={{ Session::get('pu_id')[0] }}">
                    <i class="material-icons">perm_media</i>
                    <span>{{ $dashboardData['otd'] }}</span>
                </a>
            </li>
            <li class="MG_COMMITMENT {{ $page == 'MG_COMMITMENT' ? 'active' : ''}}">
                <a href="{{url()}}/MG/common?page=commitment?&pu_id={{ Session::get('pu_id')[0] }}">
                    <i class="material-icons">widgets</i>
                    <span>{{ $dashboardData['commitment_perc'] }}</span>
                </a>
            </li>
            <li class="MG_PROGRESS_UPDATE {{ $page == 'MG_PROGRESS_UPDATE' ? 'active' : ''}}">
                <a href="{{url()}}/MG/common?page=progress_update?&pu_id={{ Session::get('pu_id')[0] }}">
                    <i class="material-icons">layers</i>
                    <span>{{ $dashboardData['progress_update'] }}</span>
                </a>
            </li>
            <li class="MG_OTD_PREDICTION {{ $page == 'MG_OTD_PREDICTION' ? 'active' : ''}}">
                <a href="{{url()}}/MG/otd_prediction">
                    <i class="material-icons">trending_up</i>
                    <span>{{ $dashboardData['otd_prediction'] }}</span>
                </a>
            </li>
            <li class="MG_OFR_RATING {{ $page == 'MG_OFR_RATING' ? 'active' : ''}}">
                <a href="{{url()}}/MG/ofr_rating?&pu_id={{ Session::get('pu_id')[0] }}">
                    <i class="material-icons">stars</i>
                    <span>{{ $dashboardData['ofr_rating'] }}</span>
                </a>
            </li>
            <li class="MG_DELAYS {{ $page == 'MG_DELAYS' ? 'active' : ''}}">
                <a href="{{url()}}/MG/delays?&pu_id={{ Session::get('pu_id')[0] }}">
                    <i class="material-icons">schedule</i>
                    <span>{{ $dashboardData['delays'] }}</span>
                </a>
            </li>
            <li class="MG_LEADERBOARD {{ $page == 'MG_LEADERBOARD' ? 'active' : ''}}">
                <a href="{{url()}}/MG/leaderboard?user_type=supplier">
                    <i class="material-icons">assessment</i>
                    <span>{{ $dashboardData['leaderboard'] }}</span>
                </a>
            </li>
            @if(Session::get('show_buyer_link'))
            <li class="MG_TO_BUYER">
                <a href="{{url()}}/MG/redirect_to_buyer">
                    <i class="material-icons">assignment_return</i>
                    <span>Buyer Dashboard</span>
                </a>
            </li>
            @endif
            <li class="MG_LOGOUT">
                <a href="{{url()}}/vault/logout">
                    <i class="material-icons">input</i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2017 - 2018 <a href="javascript:void(0);">LSC - Management Portal</a>.
        </div>
        <div class="version">
            <b>Version: </b> 0.1
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar
