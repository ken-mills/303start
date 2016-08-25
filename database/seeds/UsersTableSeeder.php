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
    public function run()
	{
		// not verified, unsubscribed
		factory(App\User::class, 3)
			->create()
			->each(function ($u) {
					$u->subscriptions()->save(factory(App\Subscription::class, 'unsubscribed')->make());
			});

		// not verified, subscribed --should not be
		factory(App\User::class, 3)
			->create()
			->each(function ($u) {
					$u->subscriptions()->save(factory(App\Subscription::class, 'subscribed')->make());
			});

		// verified, unsubscribed
		factory(App\User::class, 'verified' , 3)
			->create()
			->each(function ($u) {
					$u->subscriptions()->save(factory(App\Subscription::class, 'unsubscribed')->make());
			});

		// verified, subscribed
		factory(App\User::class, 'verified' , 3)
			->create()
			->each(function ($u) {
					$u->subscriptions()->save(factory(App\Subscription::class, 'subscribed')->make());
			});

	}
}
