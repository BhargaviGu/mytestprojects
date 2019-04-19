@if(isset($userdata[0]) && !empty($userdata[0]))
@if(Session::get('userType')=='supplier')
<div class="row top-progress" title="Go back to overview" onclick="window.location.assign('{{url()}}/supplier/dashboard')">
@else
<div class="row top-progress" title="Go back to overview" onclick="window.location.assign('{{url()}}/buyer/dashboard')">
@endif
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 bottom-div">
                <span>Your Leaderboard Position</span>
                <span class="position">#{{ $userdata[0]['rank'] }}</span>
    </div>
</div>
@endif