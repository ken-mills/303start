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
				->seeInDatabase('users', ['email' => $user->email])
				->seeEmailWasSent();

		$same_user = App\User::where(['email' => $user->email])->first();

		$this->seeInDatabase('subscriptions', ['user_id' => $same_user->id, 'name' => 'MAILING_LIST']);

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

}
