<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etiquetas = [
            'Principiantes' => '#38b000',    // Verde fresco
            'Avanzado' => '#e63946',             // Rojo coral vibrante
            'Certificación' => '#3a86ff',        // Azul confiable
            'Práctico' => '#8338ec',    // Púrpura creativo
            'Gratuito' => '#ff9e00',              // Ámbar llamativo
        ];
        foreach($etiquetas as $nombre=>$color){
            Tag::create(compact('nombre', 'color'));
        }

    }
}
