<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Source;
use App\Models\File;
use App\Models\User;

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

        return [
            'fileable_id' => $this->faker->numberBetween(1, 10),
            'fileable_type' => $this->faker->randomElement(config('database.eloquent.morphMap')),
            'type' => $this->faker->randomElement(['video', 'photo']),
            'url' => $this->faker->imageUrl(config('database.eloquent.morphMap')),
            'extension' => $this->faker->fileExtension()
        ];
    }
}
