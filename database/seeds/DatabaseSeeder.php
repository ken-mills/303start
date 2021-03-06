<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Subscription;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		User::truncate();
		Subscription::truncate();

        $this->call(UsersTableSeeder::class);
    }
}
