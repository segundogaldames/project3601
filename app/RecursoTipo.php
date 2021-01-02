<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecursoTipo extends Model
{
    public function recursos()
    {
    	return $this->hasMany(Recurso::class);
    }
}
