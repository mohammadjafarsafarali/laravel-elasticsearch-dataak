<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;
use App\Models\PostMeta;
use App\Models\Article;
use App\Models\Source;
use App\Models\Social;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SourceSeeder::class);
        $this->call(SocialSeeder::class);
        $this->call(SocialUsernameSeeder::class);
    }
}
