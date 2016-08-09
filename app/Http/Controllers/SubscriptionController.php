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


		$new_user = new User();

		$new_user->email = $request->input('email');
		$new_user->first_name = $request->input('first_name');
		$new_user->last_name = $request->input('last_name');
		$new_user->save();

		$subscription = new Subscription();
		$subscription->user_id = $new_user->id;
		$subscription->name = 'MAILING_LIST';
		$subscription->save();

		return response()->json($new_user,200);
    }

    public function destroy(Request $request, Subscription $sub){

			$sub->delete();

        	return response('Deleted', 302);
    }

}
