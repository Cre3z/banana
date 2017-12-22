<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;

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
        $invites_sent = Guest::where('invited', '1')->where('rsvp', 'no')->count();
        $guest_total = Guest::count();
        $rsvp_invites = Guest::where('invited', '1')->where('rsvp', 'yes')->count();
        $out_invites = Guest::where('invited', '0')->count();
        return view('home', ['invites_sent'=>$invites_sent, 'guest_total'=>$guest_total, 'rsvp_invites'=>$rsvp_invites, 'out_invites'=>$out_invites]);
    }
}
