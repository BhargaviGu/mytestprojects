<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class SuppplierMiddleware
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
        if (Session::get('userType') != 'supplier')
        {
            return redirect('vault/logout');
        }
        return $next($request);
    }
}
