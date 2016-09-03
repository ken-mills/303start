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


	public function scopeIsUnverified($query)
    {
        return $query->where('verified', '=', false);
    }

	public function scopeIsVerified($query)
    {
        return $query->where('verified', '=', true);
    }

	public function scopeHasToken($query)
    {
        return $query->whereNotNull('token');
    }

    public function scopeTokenEquals($query, $token)
    {
        return $query->where('token', $token);
    }

    public function subscriptions(){
        return $this->hasMany('App\Subscription');
    }

    public static function boot(){

    	parent::boot();

    }


}
