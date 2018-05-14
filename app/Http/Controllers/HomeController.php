<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
//        $this->middleware('auth')->except(['getGuest']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invites_sent = Guest::where('invited', true)->where('rsvp', 'no')->count();
        $guest_total = Guest::where('plus_one', '!=', 'declined')->orWhere('rsvp','!=','declined')->count();
        $rsvp_invites = Guest::where('invited', true)->where('rsvp', 'yes')->count();
        $out_invites = Guest::where('invited', false)->count();
        $todo = Todo::where('public', true)->first();
        return view('home', ['invites_sent'=>$invites_sent, 'guest_total'=>$guest_total, 'rsvp_invites'=>$rsvp_invites, 'out_invites'=>$out_invites, 'todo'=>$todo]);
    }
    
    public function getGuest(Request $request)
    {
        $guests = Guest::where('token', $request->token)->get();
        if($guests){return view('welcome', ['guests_invite' => $guests, 'token'=>$request->token]);}
        else {return redirect('/');}
    }
    
    public function getEvent(Request $request)
    {
        $event = Event::where('token', $request->token)->first();
        return view('welcome', ['event' => $event]);
    }
    
    public function contactUs(Request $request)
    {
        $data = [
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'message' => $request->get('message'),
        ];
        $send = Mail::to('suzaanvzyl@gmail.com')->send(new Contact($data));
        return redirect('/');
    }
    
    public function guestRSVP(Request $request)
    {
        $guests = Guest::where('token', $request->token)->count();
        
        //couple or guest + plus one
        if($guests > 1){

            if($request->no_partner == 'on'){ 
                $guest_partner = Guest::where('token', $request->token)->whereNull('plus_one_id')->first();
                $guest_partner->rsvp = "declined";
                $guest_partner->save();

                $guest = Guest::where('token', $request->token)->whereNotNull('plus_one_id')->first();
                $guest->rsvp = "yes";
                $guest->plus_one = "declined";
                $guest->save();

            } else {
                $guest_couple = Guest::where('token', $request->token)->get();
                foreach($guest_couple as $key=>$couple){
                    if($couple->plus_one == "couple"){
                        $couple->name = $request->get('name')[$key];
                        $couple->surname = $request->get('surname');
                        $couple->email = $request->get('email');
                        $couple->invited = true;
                        $couple->rsvp = "yes";
                        $couple->save();
                    } else {
                        if($key == 0){
                            $couple->name = $request->get('name')[1] . " (". $request->get('name')[0] . "'s Plus One)";
                            $couple->surname = $request->get('surname');
                        }
                        $couple->email = $request->get('email');
                        $couple->invited = true;
                        $couple->rsvp = "yes";
                        $couple->save();
                    }
                }
            }
            
        } 
        //single guest
        else {
            $guest = Guest::where('token', $request->token)->first();
            $guest->name = $request->get('name');
            $guest->email = $request->get('email');
            $guest->invited = true;
            $guest->rsvp = "yes";
            $guest->save();
        }

        return redirect('/');
    }

    public function guestRSVPdecline(Request $request)
    {
        $guest = Guest::where('token', $request->token)->get();
        foreach($guest as $key=>$couple){
            $couple->invited = true;
            $couple->rsvp = "declined";
            $couple->save();
        }

        return redirect('/');
    }
}
