<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use App\Models\Source;
use App\Models\User;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'source_id' => Source::Factory(),
            'user_id' => User::Factory(),
            'title' => $this->faker->sentence(2),
            'content' => $this->faker->text(),
        ];
    }
}
