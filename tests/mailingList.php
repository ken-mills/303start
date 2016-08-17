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

	public function setUp()
	{
		parent::setUp();

		$this->artisan('db:seed');
	}

    public function testAdd()
    {
        $user = factory(App\User::class)->make();

		$this->json('POST', 'api/sub',$user->toArray())
			->seeJsonStructure([
                 'email',
                 'first_name',
                 'last_name',
             ]);

		$this->seeInDatabase('users', ['email' => $user->email]);

		$same_user = App\User::where(['email' => $user->email])->first();

		$this->seeInDatabase('subscriptions', ['user_id' => $same_user->id, 'name' => 'MAILING_LIST']);

    }

    public function testRemove()
    {

        $subscription = App\Subscription::first();

		$this->json('DELETE','api/sub', array('_method' => 'delete', 'id' => $subscription->id ))
			->seeJsonEquals([
                 'deleted' => true
             ]);

		$this->seeInDatabase('subscriptions', ['id' => $subscription->id])
		->notSeeInDatabase('subscriptions', ['id' => $subscription->id, 'deleted_at' => null ]);
    }

    public function testUserExists(){

    	$user = App\User::first();

    	echo('Getting user name = '.$user->last_name);

		$this->json('POST', 'api/sub',$user->toArray())
			->seeJsonEquals([
                 'email' => ['The email has already been taken.']
             ]);

    }

}
