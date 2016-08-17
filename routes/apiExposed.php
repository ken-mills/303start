<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::post('subscription', 'SubscriptionController@store');
 Route::delete('subscription', 'SubscriptionController@destroy');

 Route::post(
 	'log',
	 function(Request $request){
	 	Log::debug ($request->input('msg'));
	 });

