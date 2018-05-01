<?php

namespace App\Mail;
use App\Guest;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SingleGuestInvite extends Mailable
{
    use Queueable, SerializesModels;

    public $guest;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.single-guest-invite')->subject('Suzaan & Jovan | Trou Uitnodiging');
    }
}
