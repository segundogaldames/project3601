<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    public function tematica()
    {
    	return $this->belongsTo(Tematica::class);
    }

    public function recursoTipo()
    {
    	return $this->belongsTo(RecursoTipo::class);
    }

	public function publisher()
    {
    	return $this->belongsTo(Publisher::class);
    }
}
