<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Post;
use App\Models\Source;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $fileable = [
            User::class,
            Post::class,
            Source::class,
        ];

        return [
            'fileable_id' => $this->faker->numberBetween(1, 10),
            'fileable_type' => $this->faker->randomElement($fileable),
            'type' => $this->faker->randomElement(['video', 'image']),
            'url' => $this->faker->imageUrl($fileable),
            'extension' => $this->faker->fileExtension()
        ];
    }
}
