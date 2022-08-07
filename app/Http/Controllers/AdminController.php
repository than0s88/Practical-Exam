<?php

namespace App\Http\Controllers;

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

    public function addUser(Request $request){

        $rules = array(
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->email,
            'password' => 'required|min:8',
            'image'=>'image|nullable'
        );
   
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

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

    public function updateUser(Request $request){
        $id = Auth::user()->id;

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

    public function deleteUser(Request $request){

        User::where('id',$request->id)->delete();
        return response()->json();

    }//END FUNCTION
}
