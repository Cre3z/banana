<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GuestInvite extends Mailable
{
    use Queueable, SerializesModels;

    public $guests;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($guests)
    {
        $this->guests = $guests;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.guest-invite')->subject('Suzaan & Jovan | Troue Uitnodiging');
    }
}
