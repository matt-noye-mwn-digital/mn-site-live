<?php

namespace Database\Seeders;

use App\Models\PagePostSeo;
use App\Models\WhatIDo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhatIDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WhatIDo::create([
            'title' => 'Web Development',
            'slug' => 'web-development',
            'order' => 0,
            'main_content' => '<p>Main content</p>',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Web Development',
            'wid_id' => 1,
        ]);
        WhatIDo::create([
            'title' => 'eCommerce Development',
            'slug' => 'ecommerce-development',
            'order' => 1,
            'main_content' => '<p>Main content</p>',
        ]);
        PagePostSeo::create([
            'seo_title' => 'eCommerce Development',
            'wid_id' => 2,
        ]);
        WhatIDo::create([
            'title' => 'Laravel Development',
            'slug' => 'laravel-development',
            'order' => 2,
            'main_content' => '<p>Main content</p>',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Laravel Development',
            'wid_id' => 3,
        ]);
        WhatIDo::create([
            'title' => 'Website Maintenance',
            'slug' => 'website-maintenance',
            'order' => 3,
            'main_content' => '<p>Main content</p>',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Website Maintenance',
            'wid_id' => 4,
        ]);
        WhatIDo::create([
            'title' => 'Web Hosting',
            'slug' => 'web-hosting',
            'order' => 4,
            'main_content' => '<p>Main content</p>',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Web Hosting',
            'wid_id' => 5,
        ]);
        WhatIDo::create([
            'title' => 'Consulting',
            'slug' => 'consulting',
            'order' => 5,
            'main_content' => '<p>Main content</p>',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Consulting',
            'wid_id' => 6,
        ]);
        WhatIDo::create([
            'title' => 'Training',
            'slug' => 'training',
            'order' => 6,
            'main_content' => '<p>Main content</p>',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Training',
            'wid_id' => 7,
        ]);
    }
}
