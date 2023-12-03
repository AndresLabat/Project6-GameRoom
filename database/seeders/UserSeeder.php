<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => Str::random(30),
            'nickname' => Str::random(30),
            'email' => Str::random(30) . '@example.com', 
            'password' => Hash::make('Aa1234'),
            'role' => 'super_admin',
        ]);

        DB::table('users')->insert([
            'name' => Str::random(30),
            'nickname' => Str::random(30),
            'email' => Str::random(30) . '@example.com', 
            'password' => Hash::make('Aa1234'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => Str::random(30),
            'nickname' => Str::random(30),
            'email' => Str::random(30) . '@example.com', 
            'password' => Hash::make('Aa1234'),
        ]);
    }
}
