<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'site_name',
            'value' => 'Matt Noye'
        ]);
        Setting::create([
            'key' => 'site_url',
            'value' => 'http://matt-noye.local:8888'
        ]);
        Setting::create([
            'key' => 'site_description',
            'value' => 'Freelance full stack developer based in Darlington County Durham',
        ]);
        Setting::create([
            'key' => 'admin_email',
            'value' => 'hello@matt-noye.co.uk'
        ]);
    }
}
