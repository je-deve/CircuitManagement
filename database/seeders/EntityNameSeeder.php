<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntityNameSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('entity_name')->insert([
            ['entity_name' => 'King Fahad Hospital', 'created_at' => now(), 'updated_at' => now()],
            ['entity_name' => 'Madina Cardiac Center', 'created_at' => now(), 'updated_at' => now()],
            ['entity_name' => 'Uhod Hospital', 'created_at' => now(), 'updated_at' => now()],
            ['entity_name' => 'Maternity and Children Hospital', 'created_at' => now(), 'updated_at' => now()],
            ['entity_name' => 'Prince Abdul Muhsin Alola Hospital', 'created_at' => now(), 'updated_at' => now()],
            ['entity_name' => 'Yanbu General Hospital', 'created_at' => now(), 'updated_at' => now()],


        ]);
    }
}
