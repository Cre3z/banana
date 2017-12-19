<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;

class GuestsController extends Controller
{
    public function index()
    {
        return view('admin.guests');
    }
    
    public function add()
    {
        return view('admin.guests_add');
    }
    
    public function addPost(Request $request)
    {
        $email = $request->get("email");
        
        if(!$ex = Guest::where('email', $email)->first()) {
            $admin = new Guest();
            $admin->name = $request->get("name");
            $admin->surname = $request->get("surname");
            $admin->cell = $request->get("cell");
            $admin->email = $request->get("email");
            $admin->invited = "0";
            
            if($request->get("plus_one") == "on")
                $admin->plus_one = "yes";
            
            $admin->plus_one_id = "";
            $admin->rsvp = "";
            $admin->accommodation = "";
            $admin->dietary = "";
            $admin->save();
        } else {
            return redirect('/guests_add')->with(['error' => 'Guest could not be added. The email you entered already exists in your guest list. You may already have invited this person.']);
        }
        
        return redirect('/guests_invited');
    }
    
    public function all()
    {
        return view('admin.guests_all');
    }
    
    public function allJSON()
    {
        $all = Guest::all();
        return response()->json($all);
    }
    
    public function invited()
    {
        return view('admin.guests_invited');
    }
    
    public function invitedJSON()
    {
        $all = Guest::where('invited', '0')->get();
        return response()->json($all);
    }
    
    public function rsvp()
    {
        return view('admin.guests_rsvp');
    }
    
    public function rsvpJSON()
    {
        $all = Guest::where('invited', '1')->where('rsvp', 'yes')->get();
        return response()->json($all);
    }
    
    public function pending()
    {
        return view('admin.guests_pending');
    }
    
    public function pendingJSON()
    {
        $all = Guest::where('invited', '1')->where('rsvp', 'no')->orderBy('created_at', 'DESC')->get();
        return response()->json($all);
    }
}
