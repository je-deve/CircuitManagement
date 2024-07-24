<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntityTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('entity_types')->insert([
            ['entity_type' => 'Hospital', 'created_at' => now(), 'updated_at' => now()],
            ['entity_type' => 'Health Center', 'created_at' => now(), 'updated_at' => now()],
            ['entity_type' => 'Administration', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
