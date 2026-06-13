<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appLogoUrl = ('/assets/images/logo.png');
        $faviconUrl = ('/web/media/logos/favicon.png');
        $registerImage = ('assets/images/default-register.png');

        Setting::create(['key' => 'app_name', 'value' => 'Qrenda']);
        Setting::create(['key' => 'app_logo', 'value' => $appLogoUrl]);
        Setting::create(['key' => 'favicon', 'value' => $faviconUrl]);
        Setting::create(['key' => 'register_image', 'value' => $registerImage]);
        Setting::create(['key' => 'email', 'value' => 'support@qrenda.com']);
        Setting::create(['key' => 'phone', 'value' => '501234567']);
        Setting::create(['key' => 'address',
            'value' => 'King Fahd Road, Al Olaya District, Riyadh 12311, Kingdom of Saudi Arabia.',
        ]);
        Setting::create(['key' => 'prefix_code', 'value' => '966']);
        Setting::create(['key' => 'plan_expire_notification', 'value' => '5']);
    }
}
