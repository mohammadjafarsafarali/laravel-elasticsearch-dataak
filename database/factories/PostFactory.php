<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Social;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

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
            'title' => $this->faker->sentence(2),
            'content' => $this->faker->text()
        ];
    }
}
