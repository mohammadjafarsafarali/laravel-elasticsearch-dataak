<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'instagram_id' => $this->faker->userName(),
            'twitter_id' => $this->faker->userName(),
            'instagram_avatar' => $this->faker->imageUrl(),
            'twitter_avatar' => $this->faker->imageUrl(),
        ];
    }
}
