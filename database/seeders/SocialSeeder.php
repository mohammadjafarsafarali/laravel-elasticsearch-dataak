<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Post;
use App\Models\PostMeta;
use App\Models\Social;
use App\Models\User;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        //instagram
        $social = Social::factory()->state([
            'name' => 'Instagram'
        ])->has(Post::factory()->count(10)->state([
            'user_id' => $users->random()->id
        ])->has(PostMeta::factory()->state([
            'key' => 'like',
            'value' => 30
        ])))->create();

        //instagram gallery
        $social->posts()->get()->each(function ($instagramPost) {
            File::factory()->state([
                'fileable_id' => $instagramPost->id,
                'fileable_type' => get_class($instagramPost),
            ])->count(4)->create();
        });

        //twitter
        $social = Social::factory()->state([
            'name' => 'Twitter'
        ])->has(Post::factory()->count(10)->state([
            'title' => NULL,
            'user_id' => $users->random()->id
        ])->has(PostMeta::factory()->state([
            'key' => 'retweet',
            'value' => 100
        ])))->create();

        //tweeter gallery
        $social->posts()->get()->each(function ($tweeterPost) {
            File::factory()->state([
                'fileable_id' => $tweeterPost->id,
                'fileable_type' => get_class($tweeterPost),
            ])->create();
        });
    }
}
