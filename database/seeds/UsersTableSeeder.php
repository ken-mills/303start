<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $num_users = 2;

    public function run()
	{
		// not verified
		factory(App\User::class, $this->num_users)
			->create()
			->each(function ($u) {

				$this->makeSubscriptionForThisUser($u);

			});

		// verified
		factory(App\User::class, 'verified' , $this->num_users)
			->create()
			->each(function ($u) {
				$this->makeSubscriptionForThisUser($u);
			});

	}

	public function makeSubscriptionForThisUser($user){

		//subscriptions for even numbered ids.
		if(fmod($user->id,2) > 0){

			$user->subscriptions()->save(factory(App\Subscription::class, 'subscribed')->make());

		}
		else{

			$user->subscriptions()->save(factory(App\Subscription::class, 'unsubscribed')->make());

		}

		return;
	}
}
