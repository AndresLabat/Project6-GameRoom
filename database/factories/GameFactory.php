<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'category' => $this->faker->randomElement(['action', 'RPG', 'shooter', 'adventure']),
            'user_id' => 1,
        ];
    }
}