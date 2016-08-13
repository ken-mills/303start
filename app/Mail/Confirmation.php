<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
        return $this->from('info@303start.com', '303start.com')
        ->subject('Please confirm! your request to join our mailing list.')
        ->view('emails.confirmation');
    }
}
