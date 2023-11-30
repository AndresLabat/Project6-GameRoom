<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('games')->insert([
            'name' => Str::random(6),
            'category' => 'action',
            'user_id' => 1,
        ]);
    }
}