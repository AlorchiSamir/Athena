<?php

namespace App\Http\Middleware;
use Closure;

use Auth;
use App\Models\Visit;

class SetVisit
{
    public function handle($request, Closure $next)
    {
    	if(isset($request->route()->action['as'])){
    		$user =  Auth::user();
    		$user_id = (isset($user->id)) ? $user->id : null;
	    	$content_id = (isset($request->id)) ? $request->id : null;
	    	$page = $request->route()->action['as'];

	        $visit = Visit::where([['user_id', '=', $user_id], ['content_id', '=', $content_id], ['page', '=', $page]])->first();
	        if(is_null($visit)){
		        $datas = [
		        	'user_id' => $user_id,
		        	'page' => $page,
		        	'content_id' => $content_id,
		        	'count' => 1
		        ];
		        Visit::insert($datas);
	    	}
	    	else{
	    		$visit->count = $visit->count + 1;
	    		$visit->update();
	    	}
    	}   
        return $next($request);
        
    }
}