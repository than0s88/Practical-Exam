<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function redirectTo() {
        $role = Auth::user()->role; 
        switch ($role) {

          case 'Admin':
            return '/admin/dashboard';
            break;

          case 'User':
            return '/welcome';
            break; 
      
          default:
            return '/'; 
          break;
          
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

}