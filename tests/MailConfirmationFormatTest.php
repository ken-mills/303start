<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Subscription;
use App\Mail\Confirmation;
use App\Mail\Confirmed;

class MailConfirmationFormatTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
	use MailTesting;

	public function setUp()
	{
		parent::setUp();

	}

    public function testConfirmation()
    {

		$subscription = Subscription::userHas()->firstOrFail();
		$user = User::find($subscription->user_id);

		Mail::to($user)
			->send(new Confirmation($subscription,$user));

		$this->seeEmailWasSent();
		$this->seeEmailTo($user->email);
		$this->seeEmailFrom("postmaster@303start.com");

    }
}
