<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
       	User::creating(function($user){

    		$user->token = str_random(30);

    	});

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if($this->app->environment() !== 'production') {
        	$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    	}
    }
}
