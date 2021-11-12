<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\File;
use App\Models\Source;
use App\Models\User;
use Database\Factories\SourceFactory;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Source::Factory()->count(10)->has(
            Article::factory()->count(10)
        )->create()->each(function ($source) {
            File::factory()->state([
                'fileable_id' => $source->id,
                'fileable_type' => get_class($source),
                'type' => 'image',
                'extension' => 'jpg'
            ])->create();
        });
    }
}
