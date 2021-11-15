<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ArticleMeta;
use App\Models\Article;

class ArticleMetaFactory extends Factory
{
    protected $model = ArticleMeta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'article_id' => Article::factory(),
            'key' => $this->faker->word,
            'value' => $this->faker->word
        ];
    }
}
