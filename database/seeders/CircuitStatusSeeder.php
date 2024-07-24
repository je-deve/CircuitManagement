<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CircuitStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('circuit_statuses')->insert([
            ['circuit_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['circuit_status' => 'Inactive', 'created_at' => now(), 'updated_at' => now()],
            ['circuit_status' => 'Maintenance', 'created_at' => now(), 'updated_at' => now()],
            ['circuit_status' => 'Decommissioned', 'created_at' => now(), 'updated_at' => now()],
            ['circuit_status' => 'Faulty', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
