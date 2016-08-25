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
Route::get('subscription/{subscription}/test/confirm', 'EmailConfirmationController@index')->name('test.confirm');
//web route for showing confirmed page
Route::get('subscription/confirmed', 'EmailConfirmationController@confirmed')->name('confirmed');

//web route for posting confirmation from email
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail')->name('register.confirm');



Auth::routes();

Route::get('/home', 'HomeController@index');
