<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lead_numbers')->insert([
            [
                'gateway_number_id' => 1,
                'lead_number' => 7869477410,
                'new' => 'no'
            ],
            [
                'gateway_number_id' => 2,
                'lead_number' => 3152045111,
                'new' => 'no'
            ],
            [
                'gateway_number_id' => 3,
                'lead_number' => 6624087152,
                'new' => 'no'
            ],
            [
                'gateway_number_id' => 3,
                'lead_number' => 9723256380,
                'new' => 'yes'
            ],
            [
                'gateway_number_id' => 3,
                'lead_number' => 6153426755,
                'new' => 'no'
            ]
        ]);
    }
}

