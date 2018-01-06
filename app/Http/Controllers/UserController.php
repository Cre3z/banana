<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class UserController extends Controller
{
    public function index(){
        return view('admin.users.index');
    }
    
    public function indexJSON()
    {
        $all = User::all();
        return response()->json($all);
    }
    
    public function addView(){
        return view('admin.users.add');
    }
    
    public function add(Request $request){
        
        if(!$ex = User::where('email', $request->get("email"))->first()) {
            
            $admin = new User();
            $admin->name = $request->get("name");
            $admin->type = "admin";
            $admin->role = $request->get("role");
            $admin->password = bcrypt($request->get("password"));
            $admin->email = $request->get("email");
            $admin->color = $request->get("color");
            $admin->save();
            
            return redirect('/users');
            
//            if($request->get("send") == 'on'){
//                
//            }
            
        } else {
            return redirect('/add-user')->with(['error' => 'User could not be added. The email you entered already exists in your user list. You may already have added this person.']);
        }
    }
    
    public function deactivate(Request $request){
        
        if($request->get("email") != 'admin@example.com') {
            $check = User::where('email', $request->get('email'))->delete();
        }
    }
    
    public function logout(){
        Auth::logout();
        Session::flush(); 
        return redirect('/login');
    }
}
