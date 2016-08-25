<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /**
use Notifiable;
     * The attributes that are mass assignable.
     *
     * @var array
     */

	private $token;

    protected $fillable = [
        'name', 'email', 'password', 'first_name','last_name','verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','token'
    ];

	public function setEmailVerificationToken(){

    	$this->token =  str_random(30);

    	return $this->token;

    }


	public function scopeUnVerified($query)
    {
        return $query->where('verified', '=', false);
    }

    public function subscriptions(){
        return $this->hasMany('App\Subscription');
    }


}
