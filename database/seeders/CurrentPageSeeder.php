<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PagePostSeo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrentPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'page_title' => 'Homepage',
            'slug' => '/',
            'published' => true,
        ]);
        PagePostSeo::create([
            'seo_title' => 'Homepage',
            'page_id' => 1,
        ]);
        Page::create([
            'page_title' => 'Knowledgebase',
            'slug' => '/knowledgebase',
            'published' => true,
        ]);
        PagePostSeo::create([
            'seo_title' => 'Knowledgebase',
            'page_id' => 2,
        ]);
        Page::create([
            'page_title' => 'Portfolio',
            'slug' => '/portfolio',
            'published' => true,
        ]);
        PagePostSeo::create([
            'seo_title' => 'Portfolio',
            'page_id' => 3,
        ]);
        Page::create([
            'page_title' => 'Resources',
            'slug' => '/resources',
            'published' => true,
        ]);
        PagePostSeo::create([
            'seo_title' => 'Resources',
            'page_id' => 4,
        ]);
        Page::create([
            'page_title' => 'Who I Work With',
            'slug' => '/who-i-work-with',
            'published' => true,
        ]);
        PagePostSeo::create([
            'seo_title' => 'Who I Work With',
            'page_id' => 5,
        ]);
        Page::create([
            'page_title' => 'What I Do',
            'slug' => '/what-i-do',
            'published' => true,
        ]);
        PagePostSeo::create([
            'seo_title' => 'What I Do',
            'page_id' => 6,
        ]);
    }
}
