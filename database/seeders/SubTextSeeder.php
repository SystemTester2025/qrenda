<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SubTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtextExist = Setting::where('key', 'sub_text')->exists();
        if (! $subtextExist) {
            Setting::create(['key' => 'sub_text', 'value' => 'One tap. Your business']);
        }
    }
}
