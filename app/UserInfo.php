<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
    	'username', 'address', 'city_id', 'township_id',
    ];
}
