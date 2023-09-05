<?php

namespace Database\Seeders;

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
        WhatIDo::create([
            'title' => 'eCommerce Development',
            'slug' => 'ecommerce-development',
            'order' => 1,
            'main_content' => '<p>Main content</p>',
        ]);
        WhatIDo::create([
            'title' => 'Laravel Development',
            'slug' => 'laravel-development',
            'order' => 2,
            'main_content' => '<p>Main content</p>',
        ]);
        WhatIDo::create([
            'title' => 'Website Maintenance',
            'slug' => 'website-maintenance',
            'order' => 3,
            'main_content' => '<p>Main content</p>',
        ]);
        WhatIDo::create([
            'title' => 'Web Hosting',
            'slug' => 'web-hosting',
            'order' => 4,
            'main_content' => '<p>Main content</p>',
        ]);
        WhatIDo::create([
            'title' => 'Consulting',
            'slug' => 'consulting',
            'order' => 5,
            'main_content' => '<p>Main content</p>',
        ]);
        WhatIDo::create([
            'title' => 'Training',
            'slug' => 'training',
            'order' => 6,
            'main_content' => '<p>Main content</p>',
        ]);
    }
}
