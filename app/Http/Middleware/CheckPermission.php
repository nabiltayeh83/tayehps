<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckPermission
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
				
		$currentAction = \Route::currentRouteAction();
		list($controller, $method) = explode('@', $currentAction);
		$controller = strtolower(preg_replace('/.*\\\/', '', $controller));
		$controller=str_replace("controller","",$controller);
		if($method=="index" || $method=="edit") $method="";

		$url="admin/$controller/$method";
		$url  = str_finish($url, '/');
		$url = substr($url, 0, -1); 

		$link = \DB::table('links')->where('url', '=', $url)->where('showinmenu', '=', 1)->first();
		
		if($link != NULL){
				
		$haveAdminThisLink = \DB::table('admin_link')
					->where('link_id', '=', $link->id)
					->where('user_id', '=', Auth::user()->id)
					->count(); 
					
					if(!$haveAdminThisLink){
					return redirect('/home/noaccess');
					}
		
		}
		
		
        return $next($request);
    }
	
	
}
