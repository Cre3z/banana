<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Todo;
use App\Mail\Contact;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invites_sent = Guest::where('invited', true)->where('rsvp', 'no')->count();
        $guest_total = Guest::count();
        $rsvp_invites = Guest::where('invited', true)->where('rsvp', 'yes')->count();
        $out_invites = Guest::where('invited', false)->count();
        $todo = Todo::where('user', Auth::user()->email)->where('public', true)->first();
        return view('home', ['invites_sent'=>$invites_sent, 'guest_total'=>$guest_total, 'rsvp_invites'=>$rsvp_invites, 'out_invites'=>$out_invites, 'todo'=>$todo]);
    }
    
    public function getGuest(Request $request)
    {
        $guests = Guest::where('token', $request->token)->get();
        return view('welcome', ['guests_invite' => $guests, 'token'=>$request->token]);
    }
    
    public function getEvent(Request $request)
    {
        $event = Event::where('token', $request->token)->first();
        return view('welcome', ['event' => $event]);
    }
    
    public function contactUs(Request $request)
    {
        $gEmail     = $request->get('email');
        $gName      = $request->get('name');
        $gMessage   = $request->get('message');
        $send = Mail::to('cnortje@hotmail.com')->send(new Contact($gName, $gEmail, $gMessage))->from('noreply@suzaanjovan.co.za');
    }
    
    public function guestRSVP(Request $request)
    {
        $token = $request->token;
        $guests = Guest::where('token', $request->token)->count();
        
        //couple or guest + plus one
        if($guests && count($guests > 1)){
            $guest_couple = Guest::where('token', $request->token)->get();
            foreach($guest_couple as $key=>$couple){
                if($couple->plus_one == "couple")
                    $couple->name = $request->get('name')[$key];
                    $couple->surname = $request->get('surname');
                    $couple->email = $request->get('email');
                    $couple->invited = true;
                    $couple->rsvp = "yes";
                    $couple->save();
                } else {
                    
                }
            }
        } 
        //single guest
        else if($guests && count($guests <= 1)){
            $guest = Guest::where('token', $request->token)->first();
            $guest->name = $request->get('name');
            $guest->email = $request->get('email');
            $guest->invited = true;
            $guest->rsvp = "yes";
            $guest->save();
        }
    }
}
