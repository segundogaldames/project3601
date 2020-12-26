<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public function city()
    {
    	return $this->belongsTo(City::class);
    }
}
