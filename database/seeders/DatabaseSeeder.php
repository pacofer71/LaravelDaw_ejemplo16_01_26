<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);

        Storage::deleteDirectory('imagenes/cursos');
        Storage::createDirectory('imagenes/cursos');
        $this->call(CursoSeeder::class);

       
    }
}
