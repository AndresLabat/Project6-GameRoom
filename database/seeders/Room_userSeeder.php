<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Room_userSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('room_user')->insert([
            'user_id' => 1,
            'room_id' => 1,
        ]);

        DB::table('room_user')->insert([
            'user_id' => 2,
            'room_id' => 1,
        ]);

        DB::table('room_user')->insert([
            'user_id' => 3,
            'room_id' => 1,
        ]);

        DB::table('room_user')->insert([
            'user_id' => 4,
            'room_id' => 2,
        ]);

        DB::table('room_user')->insert([
            'user_id' => 5,
            'room_id' => 2,
        ]);

        DB::table('room_user')->insert([
            'user_id' => 6,
            'room_id' => 3,
        ]);

        DB::table('room_user')->insert([
            'user_id' => 1,
            'room_id' => 4,
        ]);

        DB::table('room_user')->insert([
            'user_id' => 2,
            'room_id' => 4,
        ]);
    }
}