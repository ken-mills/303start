<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class add_user_to_mailing_list extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test()
    {
        $user = factory(App\User::class)->make();

		$this->post('sub',$user->toArray())
			->seeJsonStructure([
                 'email',
                 'first_name',
                 'last_name',
             ]);

		$this->seeInDatabase('users', ['email' => $user->email]);

		$same_user = App\User::where(['email' => $user->email])->first();

		$this->seeInDatabase('subscriptions', ['user_id' => $same_user->id, 'name' => 'MAILING_LIST']);

    }
}
