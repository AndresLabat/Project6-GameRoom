<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => Str::random(30),
            'game_id' => rand(2, 8),
        ];
    }
}