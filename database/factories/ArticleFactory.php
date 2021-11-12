<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Source;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->sentence(2),
            'content' => $this->faker->text(),
            'url' => $this->faker->url,
        ];
    }
}
