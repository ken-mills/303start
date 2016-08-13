<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Subscription;
use App\Mail\Confirmation;
use Log;

use App\Http\Requests;

class SubscriptionController extends Controller
{
    //

    public function store(Request $request){


		//$rules = array('test' => array('size:5', 'regex:foo'));

		$this->validate($request, [
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'email' => 'bail|required|unique:users|max:255',
		]);

		$new_user = new User();

		Log::debug('store:request:last_name = '.$request->input('email'));

		$new_user->email = $request->input('email');
		$new_user->first_name = $request->input('first_name');
		$new_user->last_name = $request->input('last_name');
		$new_user->password = bcrypt(str_random(10));
		$new_user->save();

		$subscription = $new_user->subscriptions()->create([
			'name' => 'MAILING_LIST',
		]);

/*
 *  Error using guzzle and mailable, json_encode in client.php
 */
	//	Mail::to($new_user)->send(new Confirmation($subscription,$new_user));

		return response()->json($new_user,200);
    }

    public function destroy(Request $request){

			Subscription::find($request->input('id'))->delete();

			return response()->json(array('deleted' => true),302);
    }

}
