<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $welcome;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($welcome)
    {
        $this->welcome = $welcome;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome To Lalbaba')
                    ->view('emails.welcome');
    }
}
