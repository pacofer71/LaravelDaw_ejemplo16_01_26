<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Bilions\FakerImages\FakerImageProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new FakerImageProvider(fake()));
        $image = fake()->image(sys_get_temp_dir(), 640, 480);
        $categorias=Category::all();
        $usuarios=User::all();
        return [
            'nombre'=>fake()->unique()->realText(50),
            'descripcion'=>fake()->realText(250),
            'disponible'=>fake()->randomElement(['SI', 'NO']),
            'category_id'=>$categorias->random()->id,
            'user_id'=>$usuarios->random()->id,
            'imagen'=> Storage::putFileAs('imagenes/cursos', new File($image), basename($image)),
        ];
    }
}
