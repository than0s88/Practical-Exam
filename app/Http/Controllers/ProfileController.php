<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function updateProfile(UpdateUserRequest $request, User $user){

        $data = array();

        if($request->hasFile('image')){
            $filename=str_replace(" ","-", $request->name);
            $extension = $request->file('image')->getClientOriginalExtension();
            $data['image'] = $image=$filename.'.'.$extension;
            $request->file('image')->storeAs('public/image/',$image);  
        }

        if(!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }

        $data['role'] = $request->role;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        User::where('id',$request->id)->update($data);
        return response()->json();
    }//END FUNCTION

}
