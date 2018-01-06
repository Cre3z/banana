<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuestEmail;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('sendmails', function() {
    // our timerange is an hour ago from now.
    $start  = time() - 3600;
    $end    = time();
    $emails = \App\Email::where('timetosend', '>=', $start)->where('timetosend', '<=', $end)->get();

    // Now we get all the guests
    $guests = \App\Guest::all();
    foreach($guests AS $guest) {
        $gEmail     = $guest->email;
        $gName      = $guest->name;
        $gSurname   = $guest->surname;
        foreach($emails AS $email) {
            $body   = $email->body;
            $subject   = $email->subject;
            $send = Mail::to($gEmail)->send(new GuestEmail($guest, $body, $subject));
            echo "Mail sent to: ({$gName} {$gSurname}) {$gEmail} \n";
        }
    }

});