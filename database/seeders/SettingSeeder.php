<?php

namespace Database\Seeders;

use App\Models\Setting;
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
        $setting = Setting::create([
            'site_name' => __('admin.madarNews'),
            'phone' => '+971 555 555 555',
            'mobile' => '+971 555 555 555',
            'email' => 'mail@mail.mail',
            'address' => 'الإمارات',
            'logo' => 'logo.png',
            'favicon'=> 'favicon.png',
            'facebook_url'=> 'https://www.facebook.com/',
            'telegram_url'=> 'https://web.telegram.org/#/login',
            'twitter_url'=> 'https://twitter.com/twitter',
        ]);
    }
}
