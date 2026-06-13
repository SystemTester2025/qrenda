<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DefaultCountryCode extends Seeder
{
    public function run(): void
    {
        $countryCodeExist = Setting::where('key', 'default_country_code')->exists();

        if (! $countryCodeExist) {
            Setting::create(['key' => 'default_country_code', 'value' => 'sa']);
        }
    }
}
