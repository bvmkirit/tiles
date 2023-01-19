<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->insert([
            [
                'website_name' => 'Movie',
                'logo' => '',
                'website_email'=>'admin@gmail.com',
                'phone_no'=>'8877665544',
                'facebook_url'=>'https://www.facebook.com/',
                'twitter_url'=>'https://twitter.com/',
                'instagram_url'=>'https://www.instagram.com/',
                'telegram_url'=>'https://web.telegram.org/',
                'youtube_url'=>'https://www.youtube.com/'
            ],

        ]);
    }
}
