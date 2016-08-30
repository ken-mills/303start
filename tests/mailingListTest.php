<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MailingList extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


	//enable mail logging before running these tests.

	use MailTesting;

	public function setUp()
	{
		parent::setUp();

		$this->artisan('db:seed');

	}

    public function testAdd()
    {

        $user = factory(App\User::class)->make();

		//try ->dump();
		$this->json('POST', 'api/subscription',$user->toArray())
				->seeJson([ 'email' => $user->email])
				->seeEmailWasSent()
				->seeEmailContains('register/confirm/')
				->seeEmailTo($user->email)
				->seeEmailFrom("postmaster@303start.com");

		$same_user = App\User::where(['email' => $user->email])->first();

		$this->seeInDatabase('users', ['email' => $same_user->email, 'token' => $same_user->token]);

		$this->seeInDatabase('subscriptions', ['user_id' => $same_user->id, 'name' => 'MAILING_LIST']);

		//checking email for token with database user
		$this->seeEmailToken($same_user->token);


    }


    public function testRemove()
    {

        $subscription = App\Subscription::firstOrFail();

		$this->json('DELETE','api/subscription', array('_method' => 'delete', 'id' => $subscription->id ))
			->seeJsonEquals([
                 'deleted' => true
             ]);

		$this->seeInDatabase('subscriptions', ['id' => $subscription->id])
			->notSeeInDatabase('subscriptions', ['id' => $subscription->id, 'deleted_at' => null ]);
    }

    public function testUserExists(){

    	$user = App\User::firstOrFail();

		$this->json('POST', 'api/subscription',$user->toArray())
			->seeJsonEquals([
                 'email' => ['The email has already been taken.']
             ]);

    }

    public function testUserCanConfirm(){

    	$user = App\User::isUnverified()->hasToken()->firstOrFail();

		$this->visit('register/confirm/'.$user->token)
			->see('Your email address has been confirmed.')
			->seeInDatabase('users',['id' => $user->id, 'token' => null, 'verified' => true ])
			->seeEmailContains('Your email address has been confirmed');


    }

    public function testUserHasBadToken(){

	    try {

			$this->visit('register/confirm/tokenisjunk');

        } catch (\Exception $e) {

            $this->assertContains ("Received status code [404]",$e->getMessage());

        }

    }
}

class NotFoundHttpException extends Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Exception $previous = null) {
        // some code
        $this->message = "The resource on this site was not found";
        $this->code = $previous->getCode();

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }
}