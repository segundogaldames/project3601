<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    public function authors()
    {
    	return $this->hasMany(Author::class);
    }
}
