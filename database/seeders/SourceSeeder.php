<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Source;
use App\Models\File;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instagram = Source::Factory()->state(['name' => 'instagram'])->create();
        $twitter = Source::Factory()->state(['name' => 'twitter'])->create();

        Source::Factory()
            ->count(10)
            ->create()
            ->each(function ($source) {
                File::factory()->state([
                    'fileable_id' => $source->id,
                    'fileable_type' => get_class($source),
                    'type' => 'photo',
                    'extension' => 'jpg'
                ])->create();
            });


        File::factory()->state([
            'fileable_id' => $instagram->id,
            'fileable_type' => get_class($instagram),
            'type' => 'photo',
            'extension' => 'jpg'
        ])->create();

        File::factory()->state([
            'fileable_id' => $twitter->id,
            'fileable_type' => get_class($twitter),
            'type' => 'photo',
            'extension' => 'jpg'
        ])->create();
    }
}
