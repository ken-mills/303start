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

        $this->post('fan', $user->toArray())
            ->seeJsonStructure([
                 'email',
                 'first_name',
                 'last_name',
             ]);

        $this->assertTrue(true);
    }
}
