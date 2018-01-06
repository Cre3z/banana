<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;

class TodoController extends Controller
{
    public function index(){
        $user = Auth::user();
        $all = Todo::where('user', $user->email)->orWhere('public', true)->get();
        return view('admin.todo.index', ['all'=> $all]);
    }
}
