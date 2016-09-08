<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Log;
use Mail;
use Validator;

use App\User;
use App\Subscription;
use App\Mail\Confirmation;

use App\Http\Requests;

class SubscriptionController extends Controller
{
    //

    public function store(Request $request){


        $validator = Validator::make($request->all(), [
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'email' => 'bail|required|unique:users|max:255',
        ]);

        if ($validator->fails()) {

        	$data = [
						'status' => 'error',
						'message' => 'Validation failed!',
						'errors' => $validator->errors()
					];

			return response()->json( $data , 200);

        }


		$new_user = new User();

		$new_user->email = $request->input('email');
		$new_user->first_name = $request->input('first_name');
		$new_user->last_name = $request->input('last_name');
		$new_user->password = bcrypt(str_random(10));
		$new_user->save();

		$subscription = $new_user->subscriptions()->create([
			'name' => 'MAILING_LIST',
			'subscribed' => true
		]);

		Mail::to($new_user)
			->send(new Confirmation($subscription,$new_user));

		return response()->json(['status' => 'ok' , 'data' => $new_user]);
    }

    public function destroy(Request $request){

			Subscription::find($request->input('id'))->delete();

			return response()->json(array('deleted' => true),302);
    }

    public function update(Request $request, Subscription $subscription){


		Log::debug('subscriptionController:update:subscription:id/user_id = '.$subscription->id .'/'.$subscription->user_id);
		$subscription->confirmed_at = Carbon::now();
		$subscription->save();

		$user = User::find($subscription->user_id);

//		Mail::to($user)
//			->send(new Confirmed($user));

		return redirect()->route('confirmed');

    }

}
