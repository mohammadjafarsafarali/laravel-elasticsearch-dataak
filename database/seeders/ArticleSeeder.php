<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Exception;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        for ($i = 0; $i <= 100; $i++) {
            Article::factory()->state([
                'user_id' => random_int(1, 5),
                'source_id' => random_int(1, 12)
            ])->create();
        }
    }
}
