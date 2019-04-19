<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Clients;
use DB;
use Illuminate\Support\Facades\Redirect;

class PreventBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if(!Session::has('userType')){
            $client_data = Clients::where('id', '=', DB::table('clients')->max('id'))
                            ->get();
            $client_data = $client_data[0];

            return Redirect::to('/'.$client_data['client_name']);
        }else{
            return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
                ->header('Pragma','no-cache')
                ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
        }
    }
}
