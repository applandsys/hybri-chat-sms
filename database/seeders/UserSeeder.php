<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Joyoto Noyan Sarker',
                'email' => 'joy1@gmail.com',
                'role' => 'super',
                'password' => Hash::make('Dhaka@1230'),
            ],
            [
                'name' => 'Joyoto Noyan Sarker',
                'email' => 'joy2@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('Dhaka@1230'),
            ],
            [
                'name' => 'Joyoto Noyan Sarker',
                'email' => 'joy3@gmail.com',
                'role' => 'user',
                'password' => Hash::make('Dhaka@1230'),
            ]
        ]);
    }
}
