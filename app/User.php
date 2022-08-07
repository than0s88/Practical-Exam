<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'role','name', 'email', 'password','image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function hasRole($role)
    {
        return User::where('role', $role)->get();
    }
}
