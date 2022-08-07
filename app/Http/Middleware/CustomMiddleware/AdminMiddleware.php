<?php

namespace App\Http\Middleware\CustomMiddleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

            if ($request->user()->role == 'Admin')
            {
                    return $next($request);
            }
            return back();

        }else{

            Auth::logout();
            return redirect('/');
        }      


    }
}
