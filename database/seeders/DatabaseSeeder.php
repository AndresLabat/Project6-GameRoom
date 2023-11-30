<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

    {
        $this->call([
            UserSeeder::class,
        ]);

        \App\Models\User::factory(7)->create();

        $this->call([
            GameSeeder::class,
        ]);

        \App\Models\Game::factory(9)->create();

        $this->call([
            RoomSeeder::class,
        ]);

        \App\Models\Room::factory(9)->create();
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
