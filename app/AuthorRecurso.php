<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorRecurso extends Model
{
    public function author()
    {
    	return $this->belongsTo(Author::class);
    }

    public function recurso()
    {
    	return $this->belongsTo(Recurso::class);
    }
}
