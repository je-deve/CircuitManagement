<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CircuitTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('circuit_types')->insert([
            ['circuit_type' => 'DIA', 'created_at' => now(), 'updated_at' => now()],
            ['circuit_type' => 'IP', 'created_at' => now(), 'updated_at' => now()],
            ['circuit_type' => 'IPMW', 'created_at' => now(), 'updated_at' => now()],
            ['circuit_type' => 'DIASMW', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
