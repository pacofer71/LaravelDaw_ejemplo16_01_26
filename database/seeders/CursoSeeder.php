<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags=Tag::pluck('id')->toArray(); // [1,2,3,4,5]
        $cursos=Curso::factory(100)->create();
        foreach($cursos as $curso){
            shuffle($tags);
            $curso->tags()->attach(self::getRandomTagIdArray($tags));
        }
    }
    private static function getRandomTagIdArray(array $tags): array{
        $tagsId=array_slice($tags, 0, random_int(1, count($tags)));
        return $tagsId;
    }
}
