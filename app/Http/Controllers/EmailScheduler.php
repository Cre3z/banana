<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class EmailScheduler extends Controller
{

    public function indexView() {
        return view('admin.emailScheduler.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Email::all();
        return response()->json($all);
    }
    
    public function addView(){
        return view('admin.emailScheduler.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $email = new Email;
        $email->name = $request->get("name");
        $email->subject = $request->get("subject");
        $email->date = $request->get("date");
        $email->time = $request->get("time");
        $email->timetosend = strtotime('now +1min');
        $email->body = $request->get("body");
        $email->save();
        
        return redirect('/email-scheduler');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
