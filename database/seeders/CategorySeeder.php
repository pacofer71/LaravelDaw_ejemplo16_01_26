<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Desarrollo Web' => '#4361ee',    // Azul moderno y vibrante
            'Ciencia de Datos' => '#7209b7',  // Púrpura elegante
            'Diseño UX/UI' => '#f72585',      // Rosa magenta moderno
            'Marketing Digital' => '#f8961e', // Naranja energético
            'Negocios' => '#2a9d8f',          // Verde esmeralda profesional
        ];
        foreach($categorias as $nombre=>$color){
            Category::create(compact('nombre', 'color'));
        }

    }
}
