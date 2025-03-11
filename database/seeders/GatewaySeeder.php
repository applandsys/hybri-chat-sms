<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gateways')->insert(
            [
                'name' => 'Signal',
                'slug' => 'signal',
                'api_key' => 'api-key',
                'api_secret' => 'api-secret',
                'status' => 'active',
            ]
        );
    }
}

