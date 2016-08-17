<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    //
    use SoftDeletes;


    protected $table = 'subscriptions';


	protected $fillable = [
        'user_id','name','confirmed_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function users(){
      return $this->belongsToMany('App\User');
    }


}
