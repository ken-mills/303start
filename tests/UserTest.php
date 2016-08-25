<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanVerifyEmail()
    {

		$user = App\User::unverified()->firstOrFail();

		$user->token = $user->setEmailVerificationToken();
		$user->save();

		$this->visit('register/confirm'.'/'.$user->token)
		 ->assertResponseOk();

    }
}
