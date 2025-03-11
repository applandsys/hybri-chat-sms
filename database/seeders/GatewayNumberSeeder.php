<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GatewayNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gateway_numbers')->insert([
            [
                'user_id' => 3,
                'gateway_id' => 1,
                'number' => '2078658731',
                'limit' => 400,
                'status' => 'active',
            ],
            [
                'user_id' => 3,
                'gateway_id' => 1,
                'number' => '2095937759',
                'limit' => 400,
                'status' => 'active',
            ],
            [
                'user_id' => 3,
                'gateway_id' => 1,
                'number' => '2293985034',
                'limit' => 400,
                'status' => 'active',
            ],
            [
                'user_id' => 3,
                'gateway_id' => 1,
                'number' => '5512916172',
                'limit' => 400,
                'status' => 'active',
            ],
            [
                'user_id' => 3,
                'gateway_id' => 1,
                'number' => '8392489069',
                'limit' => 400,
                'status' => 'active',
            ],
            [
                'user_id' => 3,
                'gateway_id' => 1,
                'number' => '2107963334',
                'limit' => 400,
                'status' => 'inactive',
            ]
        ]);
    }
}


