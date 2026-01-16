<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable=['nombre', 'color'];
     // Relaciones
     public function cursos(): HasMany{
        return $this->hasMany(Curso::class);
     } 
}
