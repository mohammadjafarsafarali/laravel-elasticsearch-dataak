<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostMeta;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostMetaFactory extends Factory
{
    protected $model = PostMeta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'key' => $this->faker->word,
            'value' => $this->faker->word
        ];
    }
}
