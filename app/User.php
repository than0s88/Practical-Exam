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

    public function uploadImage($request){

        if($request->hasFile('image')){

            $filename=str_replace(" ","-", $request->name);
            $extension = $request->file('image')->getClientOriginalExtension();
            $image=$filename.'.'.$extension;
            $request->file('image')->storeAs('public/image/',$image);

        }else{
            $image="no-image.png";
        }

        return $image;
    }



}
