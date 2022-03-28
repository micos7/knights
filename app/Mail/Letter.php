<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Letter extends Mailable
{
    use Queueable, SerializesModels;

    private $knights;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($knights)
    {
        $this->knights = $knights;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.letter')->with([
            'knights' => $this->knights,
        ]);
    }
}
