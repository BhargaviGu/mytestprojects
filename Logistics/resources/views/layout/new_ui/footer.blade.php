@if(isset($page_name))
@if(Session::get('userType')=='supplier')
<div class="row top-progress" title="Go back to overview" onclick="window.location.assign('{{url()}}/supplier/dashboard')">
@else
<div class="row top-progress" title="Go back to overview" onclick="window.location.assign('{{url()}}/buyer/dashboard')">
@endif
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 footer-text">
    	<div class="progress-main-div" style="width:{{ isset($user_perc['percentage']) && !empty($user_perc['percentage']) ? $user_perc['percentage'] : '0%' }}; background: {{ isset($user_perc['color']) && !empty($user_perc['color']) ? $user_perc['color'] : '' }}"></div>
        <div class="progress-percentage"></div>
        <div class="numer">{{ isset($user_perc['value']) && !empty($user_perc['value']) ? $user_perc['value'] : '0' }}<span class="denom">/{{ isset($user_perc['total']) &&  !empty($user_perc['total']) ? $user_perc['total'] : '0' }}</span></div>
    </div>
</div>
@endif