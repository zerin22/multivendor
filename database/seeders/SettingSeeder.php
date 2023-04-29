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
        Setting::truncate();
        Setting::insert([
            'facebook' => 'http://google.com/',
            'linkedin' => 'http://google.com/',
            'twitter' => 'http://google.com/',
            'instagram' => 'http://google.com/',
            'footer_description' => 'orem ipsum dolor sit amet, consectetur adipiscing',
            'store_address' => '2005 Your Address Goes Here. 896, Address 10010, HGJ',
            'store_email' => 'demo@example.com',
            'store_phone' => '0123456789',
            'meta_title' => 'Meta Title',
            'meta_description' => 'orem ipsum dolor sit amet, consectetur adipiscing meta',
            'logo_header' => 'uploads/settings/logo_header.png',
            'logo_footer' => 'uploads/settings/logo_footer.png',
            'favicon' => 'uploads/settings/favicon.jpg',
        ]);
    }
}
