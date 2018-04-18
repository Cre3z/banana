<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Event;
use Auth;

class TodoController extends Controller
{
    public function index(){
        $user = Auth::user();
        $all = Todo::where('user', $user->email)->orWhere('public', true)->get();
        return view('admin.todo.index', ['all'=> $all]);
    }

    public function newList(Request $request){
        $todo = new Todo;
        $todo->name = $request->get('name');
        $todo->subtext = $request->get('details');
        $todo->entries = [];
        $todo->public = false;
        $todo->user = Auth::user()->email;
        $todo->save();
        return redirect('/todo');
    }

    public function deleteList(Request $request){
      $id = $request->get('id');
      $todo = Todo::find($id);
      $todo->delete();
        
    if($todo->event){
        $event = Event::find($todo->event);
        $event->todo = 0;
        $event->save();
    }
      return redirect('/todo');
    }

    public function status(Request $request){
        $id = $request->get('id');
        $todo = Todo::find($id);
        $todo->public = (!$todo->public);
        $todo->save();
    }

    public function update(Request $request){
        $id = $request->get('id');
        $index = $request->get('index');
        $todo = Todo::find($id);
        $array = $todo->entries;
        $array[$index]['body'] = $request->get('value');
        $todo->entries = $array;
        $todo->save();
    }

    public function checked(Request $request){
        $id = $request->get('id');
        $index = $request->get('index');
        $todo = Todo::find($id);
        $array = $todo->entries;
        $array[$index]['checked'] = (!$array[$index]['checked']);
        $todo->entries = $array;
        $todo->save();
    }

    public function new(Request $request){
        $id = $request->get('id');
        $name = $request->get('new');
        $todo = Todo::find($id);
        $array = $todo->entries;

        $new = ['body' => $name, 'checked' => false, 'timestamp' => '12:00'];
        array_push($array, $new);

        $todo->entries = $array;
        $todo->save();

        if($request->get('event')){
          $title = str_replace(' ', '-', $request->get('event'));
          return redirect('/events/'.$title);
        } else { return redirect('/todo'); }
    }

    public function delete(Request $request){
        $id = $request->get('id');
        $index = $request->get('index');
        $todo = Todo::find($id);
        $array = $todo->entries;
        unset($array[$index]);
        $todo->entries = $array;
        $todo->save();
    }
}
