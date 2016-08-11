<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subscription;
use Log;

use App\Http\Requests;

class SubscriptionController extends Controller
{
    //

    public function store(Request $request){


		$this->validate($request, [
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'email' => 'required|unique:users|max:255',
		]);

		$new_user = new User();

		Log::debug('store:request:last_name = '.$request->input('email'));

		$new_user->email = $request->input('email');
		$new_user->first_name = $request->input('first_name');
		$new_user->last_name = $request->input('last_name');
		$new_user->password = bcrypt(str_random(10));
		$new_user->save();

		$subscription = new Subscription();
		$subscription->user_id = $new_user->id;
		$subscription->name = 'MAILING_LIST';
		$subscription->save();

		return response()->json($new_user,200);
    }

    public function destroy(Request $request){

			Subscription::find($request->input('id'))->delete();

			return response()->json(array('deleted' => true),302);
    }

}
