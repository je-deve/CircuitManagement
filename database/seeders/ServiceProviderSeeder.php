<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceProviderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('service_providers')->insert([
            ['service_provider' => 'STC', 'created_at' => now(), 'updated_at' => now()],
            ['service_provider' => 'MOBILY', 'created_at' => now(), 'updated_at' => now()],
            ['service_provider' => 'ITC', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
