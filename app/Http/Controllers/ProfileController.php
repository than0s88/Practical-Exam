<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function updateProfile(Request $request){

        $rules = array(
        'image'=>'image|nullable',
        'role' => 'required',
        'name' => 'required',
        'email' => 'unique:users,email,'.$request->id,
        'password' => 'min:8|nullable',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = array();

        if($request->hasFile('image')){
            $filename=str_replace(" ","-", $request->name);
            $extension = $request->file('image')->getClientOriginalExtension();
            $data['image'] = $image=$filename.'.'.$extension;
            $request->file('image')->storeAs('public/image/',$image);  
        }

        if($request->password != null || $request->password !=""){
            $data['password'] = Hash::make($request->password);
        }

        $data['role'] = $request->role;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        User::where('id',$request->id)->update($data);
        return response()->json();
    }//END FUNCTION

}
