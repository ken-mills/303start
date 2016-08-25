<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //

	public function confirmEmail($token){

		$user = User::whereToken()->findOrFail();

		return ('Thanks '.$user->first_name.' Your email has been confirmed');

    }
}
