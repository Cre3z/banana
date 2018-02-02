<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Todo;

class EventController extends Controller
{
    public function index(){
        return view('admin.events.index');
    }

    public function json(){
        $all = Event:: all();
        return response()->json($all);
    }

    public function delete(Request $request){
        $event = Event::find($request->get('id'));
        $event->delete();
        return redirect('/events');
    }

    public function add(){
        return view('admin.events.add');
    }

    public function update($title){
        $event = Event::where('title', str_replace('-', ' ', $title))->first();
        return view('admin.events.edit', ['event'=> $event]);
    }

    public function addPost(Request $request){
        $event = new Event;
        $event->title = $request->get('title');
        $event->description = $request->get('description');
        $event->date = $request->get('date');
        $event->time = $request->get('time');
        $event->location = $request->get('location');
        $event->organizer = Auth::user()->id;
        $event->organizer_name = Auth::user()->name;
        $event->type = $request->get('type');
        $event->count = 0;
        $event->save();

        return redirect('/events');
    }

    public function updatePost(Request $request){
        $event = Event::find($request->get('id'));
        $event->title = $request->get('title');
        $event->description = $request->get('description');
        $event->date = $request->get('date');
        $event->time = $request->get('time');
        $event->location = $request->get('location');
        $event->type = $request->get('type');
        $event->save();

        return redirect('/events');
    }

    public function view($title){
        $event = Event::where('title', str_replace('-', ' ', $title))->first();
        if($event->todo){$todo = Todo::find($event->todo);}
        return view('admin.events.view', ['event'=> $event]);
    }

}
