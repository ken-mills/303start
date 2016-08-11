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


 Route::post('sub', 'SubscriptionController@store');
 Route::delete('sub', 'SubscriptionController@destroy');

 Route::post(
 	'log',
	 function(Request $request){
	 	Log::debug ($request->input('msg'));
	 });
