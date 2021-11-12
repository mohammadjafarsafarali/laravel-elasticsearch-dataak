<?php

namespace Database\Factories;

use App\Models\Social;
use App\Models\SocialUsername;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialUsernameFactory extends Factory
{
    protected $model = SocialUsername::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'social_id' => Social::factory(),
            'user_id' => User::factory(),
            'username' => $this->faker->userName()
        ];
    }
}
