<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Social;
use App\Models\SocialUsername;
use App\Models\User;
use Illuminate\Database\Seeder;

class SocialUsernameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = Social::all();
        $users = User::all();

        $users->each(function ($user) use ($socials) {
            $socials->each(function ($social) use ($user) {
                $socialUsername = SocialUsername::factory()->state([
                    'user_id' => $user->id,
                    'social_id' => $social->id
                ])->create();

                File::factory()->state([
                    'fileable_id' => $socialUsername->id,
                    'fileable_type' => get_class($socialUsername),
                    'type' => 'image',
                    'extension' => 'jpg'
                ])->create();
            });
        });
    }
}
