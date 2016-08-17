<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

class Confirmed extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		Log::debug('Confirmed:build:user = '.$this->user->email);

        return $this->from('postmaster@303start.com', '303start.com')
        ->bcc('admin@303start.com')
        ->subject('Thank you!')
        ->view('emails.confirmed');
    }
}
