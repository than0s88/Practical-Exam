<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

//ADMIN MIDDLEWARE
Route::group(['middleware' => ['admin.auth','prevent.back']], function()
{
    Route::get('/admin/dashboard','AdminController@adminDashboard');
    Route::post('/user/add','AdminController@addUser');
    Route::post('/user/update','AdminController@updateUser');
    Route::post('/user/delete','AdminController@deleteUser');
    
});

//USER MIDDLEWARE
Route::get('/welcome','UserController@welcome')->middleware(['user.auth','prevent.back']);
Route::post('/profile/update','ProfileController@updateProfile')->middleware('check.auth');







