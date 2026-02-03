<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Récupère les IDs de catégories indexés par slug
        $categoryIdsBySlug = DB::table('categories')->pluck('id', 'slug');

        $products = [
            // Armements
            [
                'category_slug' => 'armements',
                'name' => 'Bolter Sanctifié',
                'description' => 'Bolter béni, calibrage précis, livré avec sceaux de pureté.',
                'price' => 149.90,
                'stock' => 12,
                'image' => null,
                'is_active' => true,
            ],
            [
                'category_slug' => 'armements',
                'name' => 'Épée Énergétique',
                'description' => 'Lame à champ disruptif. Activation uniquement après litanies.',
                'price' => 219.00,
                'stock' => 7,
                'image' => null,
                'is_active' => true,
            ],

            // Armures
            [
                'category_slug' => 'armures',
                'name' => 'Armure Carapace Mk IV',
                'description' => 'Protection renforcée, plaques modulaires et attaches d’insignes.',
                'price' => 399.99,
                'stock' => 5,
                'image' => null,
                'is_active' => true,
            ],
            [
                'category_slug' => 'armures',
                'name' => 'Sceaux de Pureté Pack x5',
                'description' => 'Cire et parchemins bénis. Parfait pour toute campagne de purification.',
                'price' => 24.50,
                'stock' => 80,
                'image' => null,
                'is_active' => true,
            ],

            // Reliques
            [
                'category_slug' => 'reliques',
                'name' => 'Relique de l’Omnimessie',
                'description' => 'Artefact ancien. Accès restreint aux technoprêtres accrédités.',
                'price' => 999.00,
                'stock' => 1,
                'image' => null,
                'is_active' => true,
            ],
            [
                'category_slug' => 'reliques',
                'name' => 'Auspex Antique',
                'description' => 'Scanner de terrain. Peut détecter les anomalies à courte portée.',
                'price' => 179.95,
                'stock' => 9,
                'image' => null,
                'is_active' => true,
            ],

            // Serviteurs
            [
                'category_slug' => 'serviteurs',
                'name' => 'Serviteur Logistique',
                'description' => 'Tri, manutention, transport. Routines de base préinstallées.',
                'price' => 499.00,
                'stock' => 3,
                'image' => null,
                'is_active' => true,
            ],
            [
                'category_slug' => 'serviteurs',
                'name' => 'Module Cogitateur',
                'description' => 'Cœur logique pour automates et serviteurs. Compatible rites standard.',
                'price' => 89.00,
                'stock' => 25,
                'image' => null,
                'is_active' => true,
            ],

            // Réparations
            [
                'category_slug' => 'reparations',
                'name' => 'Kit de Réparation Mechanicus',
                'description' => 'Outils, onguents et encens. Inclut un guide de rites de maintenance.',
                'price' => 59.90,
                'stock' => 40,
                'image' => null,
                'is_active' => true,
            ],
            [
                'category_slug' => 'reparations',
                'name' => 'Service Bénédiction Machine',
                'description' => 'Rituel de maintenance standard. Délais selon disponibilité du clergé.',
                'price' => 129.00,
                'stock' => 10,
                'image' => null,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            $categoryId = $categoryIdsBySlug[$product['category_slug']] ?? null;

            // Sécurité : si la catégorie n'existe pas, on n'insère pas le produit
            if (!$categoryId) {
                continue;
            }

            $name = $product['name'];
            $baseSlug = Str::slug($name);

            // Assure l'unicité du slug (au cas où)
            $slug = $baseSlug;
            $i = 2;
            while (DB::table('products')->where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $i;
                $i++;
            }

            DB::table('products')->insert([
                'category_id' => $categoryId,
                'name' => $name,
                'slug' => $slug,
                'description' => $product['description'], // peut être null si tu veux
                'price' => $product['price'],
                'stock' => $product['stock'],
                'image' => $product['image'], // null = optionnelle
                'is_active' => $product['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
