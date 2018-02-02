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
            
            //ADD PLUS ONE FIRST 
            if($request->get("plus_one") == "on"){
                $plus_one = new Guest();
                $plus_one->name = $request->get("name") . "'s Plus One";
                $plus_one->email = $request->get("email");
                $plus_one->cell = $request->get("cell");
                if($request->get("rsvp") == "on"){
                    $plus_one->invited = "1";$plus_one->rsvp = "yes";
                } else {
                    $plus_one->invited = "0";$plus_one->rsvp = "no";
                }
                $plus_one->save();
            }
            
            $admin = new Guest();
            $admin->name = $request->get("name");
            $admin->surname = $request->get("surname");
            $admin->cell = $request->get("cell");
            $admin->email = $request->get("email");
            if($request->get("plus_one") == "on"){
                $admin->plus_one = "yes"; $admin->plus_one_id = $plus_one->id;
            } else {
                $admin->plus_one = "no"; $admin->plus_one_id = '';
            }
            if($request->get("rsvp") == "on"){
                $admin->invited = "1";$admin->rsvp = "yes";
            } else {
                $admin->invited = "0";$admin->rsvp = "no";
            }
            $admin->accommodation = "";
            $admin->dietary = "";
            $admin->save();
            
            
        } else {
            return redirect('/guests_add')->with(['error' => 'Guest could not be added. The email you entered already exists in your guest list. You may already have invited this person.']);
        }
        
        return redirect('/guests_invited');
    }
    
    public function addPostCouple(Request $request)
    {
        $email = $request->get("email");
        
        if(!$ex = Guest::where('email', $email)->first()) {
            
            //ADD PLUS ONE FIRST 
            $plus_one = new Guest();
            $plus_one->name = $request->get("name")[0];
            $plus_one->surname = $request->get("surname")[0];
            $plus_one->cell = $request->get("cell");
            $plus_one->email = $request->get("email");
            if($request->get("rsvp") == "on"){
                $plus_one->invited = "1";$plus_one->rsvp = "yes";
            } else {
                $plus_one->invited = "0";$plus_one->rsvp = "no";
            }
            $plus_one->plus_one = "couple";
            $plus_one->save();
            
            $admin = new Guest();
            $admin->name = $request->get("name")[1];
            $admin->surname = $request->get("surname")[1];
            $admin->cell = $request->get("cell");
            $admin->email = $request->get("email");
            $admin->plus_one = "couple";
            $admin->plus_one_id = $plus_one->id;
            if($request->get("rsvp") == "on"){
                $admin->invited = "1";$admin->rsvp = "yes";
            } else {
                $admin->invited = "0";$admin->rsvp = "no";
            }
            $admin->accommodation = "";
            $admin->dietary = "";
            $admin->save();
            
            $plus_one = Guest::find($admin->plus_one_id);
            $plus_one->plus_one_id = $admin->id;
            $plus_one->save();
            
        } else {
            return redirect('/guests_add')->with(['error' => 'Guest could not be added. The email you entered already exists in your guest list. You may already have invited this person.']);
        }
        
        return redirect('/guests_invited');
    }
    
    public function edit($id){
        $guest = Guest::find($id);
        if($guest->plus_one == 'couple'){ $guest['couple'] = Guest::find($guest->plus_one_id);}
        return view('admin.guests_edit', ['guest'=>$guest]);
    }
    
    public function update($id, Request $request){
        $guest = Guest::find($id);
            
        //ADD PLUS ONE FIRST 
        if($request->get("plus_one") == "on"){
            $plus_one = new Guest();
            $plus_one->name = $request->get("name") . "'s Plus One";
            $plus_one->email = $request->get("email");
            $plus_one->cell = $request->get("cell");
            if($request->get("rsvp") == "on"){
                $plus_one->invited = "1";$plus_one->rsvp = "yes";
            } else {
                $plus_one->invited = "0";$plus_one->rsvp = "no";
            }
            $plus_one->save();
        } else {
            if($guest->plus_one_id){
                $plus_one = Guest::find($guest->plus_one_id);
                $plus_one->delete();
            }
        }

        $guest->name = $request->get("name");
        $guest->surname = $request->get("surname");
        $guest->cell = $request->get("cell");
        $guest->email = $request->get("email");
        if($request->get("plus_one") == "on"){
            $guest->plus_one = "yes"; $guest->plus_one_id = $plus_one->id;
        } else {
            $guest->plus_one = "no"; $guest->plus_one_id = '';
        }
        if($request->get("rsvp") == "on"){
            $guest->invited = "1";$guest->rsvp = "yes";
        }
        $guest->save();
        
        return redirect('/guests_rsvp');
    }
    
    public function updateCouple($id, Request $request){
        
        $guest = Guest::find($id);
        $plus_one = Guest::find($guest->plus_one_id);
        
        $plus_one->name = $request->get("name")[0];
        $plus_one->surname = $request->get("surname")[0];
        $plus_one->cell = $request->get("cell");
        $plus_one->email = $request->get("email");
        if($request->get("rsvp") == "on"){
            $plus_one->invited = "1";$plus_one->rsvp = "yes";
        }
        $plus_one->save();

        $guest->name = $request->get("name")[1];
        $guest->surname = $request->get("surname")[1];
        $guest->cell = $request->get("cell");
        $guest->email = $request->get("email");
        if($request->get("rsvp") == "on"){
            $guest->invited = "1";$guest->rsvp = "yes";
        }
        $guest->save();
        
        return redirect('/guests_all');
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
        $all = Guest::where('invited', '0')->orderBy('created_at', 'DESC')->get();
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
    
    public function guestsSend(Request $request)
    {
        //SEND INVITED EMAIL
        $email = $request->get("email");
        
        //COUPLE
        $find = Guest::where('email', $email)->whereNotNull('plus_one_id')->where('plus_one', 'couple')->first();
        
        //GUEST + PLUS ONE
        $find = Guest::where('email', $email)->whereNotNull('plus_one_id')->where('plus_one', 'yes')->first();
        
        //GUEST no PLUS ONE
        $find = Guest::where('email', $email)->whereNull('plus_one_id')->where('plus_one', 'no')->first();
        
        var_dump($request->get('email'));exit;
    }
}
