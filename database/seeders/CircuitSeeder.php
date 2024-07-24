<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CircuitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('circuits')->insert([
            'circuit_number' => 'CIR123',
            'speed' => '100Mbps',
            'service_provider_id' => 1, // Assuming the ID is 1
            'circuit_type_id' => 1, // Assuming the ID is 1
            'entity_type_id' => 1, // Assuming the ID is 1
            'entity_name_id' => 1, // Assuming the ID is 1
            'circuit_status_id' => 1, // Assuming the ID is 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('circuits')->insert([
            'circuit_number' => 'CIR124',
            'speed' => '100Mbps',
            'service_provider_id' => 2, // Assuming the ID is 1
            'circuit_type_id' => 3, // Assuming the ID is 1
            'entity_type_id' => 2, // Assuming the ID is 1
            'entity_name_id' => 3, // Assuming the ID is 1
            'circuit_status_id' => 2, // Assuming the ID is 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('circuits')->insert([
            'circuit_number' => 'CIR125',
            'speed' => '100Mbps',
            'service_provider_id' => 2, // Assuming the ID is 1
            'circuit_type_id' => 2, // Assuming the ID is 1
            'entity_type_id' => 3, // Assuming the ID is 1
            'entity_name_id' => 4, // Assuming the ID is 1
            'circuit_status_id' => 3, // Assuming the ID is 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
