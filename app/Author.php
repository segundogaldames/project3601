<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function nationality()
    {
    	return $this->belongsTo(Nationality::class);
    }

    public function authorRecursos()
    {
        return $this->hasMany(AuthorRecurso::class);
    }
}
