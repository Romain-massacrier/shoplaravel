<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Armements',
                'description' => 'Armes énergétiques, bolters, lames sacrées et équipements de combat.',
            ],
            [
                'name' => 'Armures',
                'description' => 'Armures de combat, exo-armures et équipements de protection.',
            ],
            [
                'name' => 'Reliques',
                'description' => 'Artefacts sacrés, objets antiques et technologies interdites.',
            ],
            [
                'name' => 'Serviteurs',
                'description' => 'Unités cybernétiques et main-d’œuvre mécanisée.',
            ],
            [
                'name' => 'Réparations',
                'description' => 'Services de maintenance et restauration d’équipements.',
            ],
        ];


        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
