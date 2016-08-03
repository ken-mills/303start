<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Log;

use App\Http\Requests;

class FanController extends Controller
{
    //

    public function store(Request $request){

		$input = [
		 'email' => $request->input('email'),
		 'first_name' => $request->input('first_name'),
		 'last_name' => $request->input('last_name'),
		];

		$new_user = User::create($input);

		Log::debug('New User created, Id:'.$new_user->last_name);

		return response()->json($new_user,200);
    }

}
