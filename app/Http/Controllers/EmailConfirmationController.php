<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Subscription;
use App\User;

class EmailConfirmationController extends Controller
{
    //
    public function index(Subscription $subscription){

    	$user = User::find($subscription->user_id);

    	return view('emails.confirmation')->with(['user' => $user, 'subscription' => $subscription->id]);

    }
}
