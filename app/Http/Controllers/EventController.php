<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;

class EventController extends Controller
{
    public function index(){
        return view('admin.events.index');
    }
}
