<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

//	dd(openssl_get_cert_locations());

	$tok = substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ,
			mt_rand( 0 ,51 ) ,1 ) .substr( md5( time() ), 1);

    return view('layout')->with('api_token',$tok);
})->name('home');

//test route for displaying confirmation email
Route::get('sub/{subscription}/test/confirm', 'EmailConfirmationController@index')->name('test.confirm');
Route::put('subscription/{subscription}', 'SubscriptionController@update')->name('api.confirm');


//actual route for displaying confirmation page
Route::get('sub/confirmed', function(){
	return view('confirmed');
});

