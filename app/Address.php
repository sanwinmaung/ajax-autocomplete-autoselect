<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
    	'address', 'city_id', 'township_id',
    ];

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function township()
    {
        return $this->belongsTo('App\Township');
    }
}
