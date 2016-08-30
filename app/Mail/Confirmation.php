<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Log;

use App\Subscription;
use App\User;

class Confirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $subscription;

    public $user;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscription $subcription, User $user)
    {
        //
        $this->subscription = $subcription;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

		Log::debug('Confirmation:build:user = '.$this->user->email);

        return $this->from('postmaster@303start.com', '303start.com')
        ->bcc('admin@303start.com')
        ->subject('Please confirm your email address.')
        ->view('emails.confirmation')->with(['user' => $this->user, 'subscription' => $this->subscription->id]);
    }
}
