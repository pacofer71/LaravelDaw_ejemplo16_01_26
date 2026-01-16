<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Curso extends Model
{
    /** @use HasFactory<\Database\Factories\CursoFactory> */
    use HasFactory;
    protected $fillable=['nombre', 'descripcion', 'disponible', 'imagen', 'user_id', 'category_id'];

    //Relaciones
    //1.- Relacion 1:N con users
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    //2.- Relacion 1:N con categories
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
    //.- Relacion N_M con tags
    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class);
    }
}
