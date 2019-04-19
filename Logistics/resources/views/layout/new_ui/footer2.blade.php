@if(isset($page_name))
@if($page_name == 'Dashboard')
	@if ( Session::get('userType') == 'supplier')
		<div class="row top-progress" title="Go back to overview" onclick="window.location.assign('{{url()}}/{{Session::get('userType')}}/orderStatus')">
	@else
		<div class="row top-progress" title="Go back to overview" onclick="window.location.assign('{{url()}}/{{Session::get('userType')}}/orderStatusScreen')">
	@endif
@else
<div class="row top-progress" title="Go back to overview" onclick="window.location.assign('{{url()}}/{{Session::get('userType')}}/dashboard')">
@endif
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 footer-bar">
        <div class="progress-main-div" style="width:{{ isset($user_perc["percentage"]) && !empty($user_perc["percentage"]) ? $user_perc["percentage"] : "0%" }}; background: {{ isset($user_perc["color"]) && !empty($user_perc["color"]) ? $user_perc["color"] : "" }}"></div>
        <div class="progress-percentage"></div>
        <div class="footer-value">{{ isset($user_perc['value']) && !empty($user_perc['value']) ? $user_perc['value'] : '0' }}
        	@if( isset($user_perc['text']) != '' )
        		<span class="footer-text">({{ isset($user_perc['text']) && !empty($user_perc['text']) ? ($user_perc['text']) : '' }})</span>
        	@endif
        </div>
    </div>
</div>
@endif
