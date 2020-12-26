<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function publishers()
    {
    	return $this->hasMany(Publisher::class);
    }
}
