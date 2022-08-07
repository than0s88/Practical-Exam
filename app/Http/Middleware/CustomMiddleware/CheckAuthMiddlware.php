<?php

namespace App\Http\Middleware\CustomMiddleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthMiddlware
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
        if (Auth::check()){

            if ($request->user()->role == 'Admin' || $request->user()->role == 'User')
            {
                return $next($request);
            }else{
                return redirect()->with('status','Access Denied');
            }

        }else{
            return redirect()->with('status','Access Denied');
        }  

    }        
}
