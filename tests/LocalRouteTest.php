<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LocalRouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
	public function setUp()
	{
		parent::setUp();

		//Need to change APP_ENV configuration for testing

	}

	public function testProtectedRoute()
    {

	    try {

			$this->visit(route('test.confirm', ['subscription' => 1]));

        } catch (\Exception $e) {

            $this->assertContains ("Received status code [403]",$e->getMessage());

        }

    }
}
