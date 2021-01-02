<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tematica extends Model
{
    public function recursos()
    {
    	return $this->hasMany(Recurso::class);
    }
}
