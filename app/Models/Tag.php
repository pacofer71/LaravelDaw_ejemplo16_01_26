<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable=['nombre', 'color'];
     // Relacion N_M con cursos
     public function cursos(): BelongsToMany{
        return $this->belongsToMany(Curso::class);
     }

     // Casting
     public function nombre(): Attribute{
        return Attribute::make(
            set: fn($v)=>strtolower($v),
        );
     } 
}
