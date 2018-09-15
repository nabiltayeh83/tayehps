<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class isactive
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
    	if(!Auth::user() || Auth::user()->is_active != 1 || Auth::user()->is_deleted == 1){
			Auth::logout();
	    	return redirect()->route('login');
		}
			return $next($request);

    }
	
	
}
