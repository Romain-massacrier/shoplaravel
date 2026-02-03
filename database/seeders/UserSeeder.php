<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Administratum',
                'email' => 'admin@imperium.test',
                'password' => Hash::make('password123'),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adeptus Clientus',
                'email' => 'user1@imperium.test',
                'password' => Hash::make('password123'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rogue Trader',
                'email' => 'user2@imperium.test',
                'password' => Hash::make('password123'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
