<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class remove_user_from_mailing_list extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test()
    {

        $subscription = App\Subscription::first();

        $data = array('_method' => 'delete','id' => $subscription->id );

		$response = $this->call('DELETE', 'sub/'.$subscription->id , $data);

		$this->assertEquals(302, $response->getStatusCode());

		$this->seeInDatabase('subscriptions', ['id' => $subscription->id])
		->notSeeInDatabase('subscriptions', ['id' => $subscription->id, 'deleted_at' => null ]);
    }

}
