<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function adminDashboard(){
        $user = User::all()->except(Auth::user()->id);
        return view('admin.admin-dashboard')->with('user',$user);
    }//END FUNCTION

    public function addUser(AddUserRequest $request){
        
        if($request->hasFile('image')){
        
        $filename=str_replace(" ","-", $request->name);
        $extension = $request->file('image')->getClientOriginalExtension();
        $image=$filename.'.'.$extension;
        $request->file('image')->storeAs('public/image/',$image);
        }else{
        $image="no-image.png";
        }

        User::create([
            'image' => $image,
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json();
    }//END FUNCTION

    public function updateUser(UpdateUserRequest $request, User $user){

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

    public function deleteUser(Request $request){

        User::where('id',$request->id)->delete();
        return response()->json();

    }//END FUNCTION
}
