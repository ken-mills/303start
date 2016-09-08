<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Validators\RestValidator;
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

        \Validator::resolver(function($translator, $data, $rules, $messages)
        {
            return new RestValidator($translator, $data, $rules, $messages);
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
/*        if($this->app->environment() !== 'production') {
        	$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    	}*/
    }
}
