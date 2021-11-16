<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Source;
use App\Models\User;

class SubscribeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'source_id' => Source::factory(),
            'user_id' => User::factory(),
            'email' => $this->faker->email(),
        ];
    }
}
