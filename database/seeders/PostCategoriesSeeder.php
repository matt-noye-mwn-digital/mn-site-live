<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostCategory::create([
           'name' => 'Uncategorised',
           'slug' => 'uncategories',
        ]);
        PostCategory::create([
            'name' => 'Blog',
            'slug' => 'blog'
        ]);
        PostCategory::create([
           'name' => 'Industry News',
           'slug' => 'industry-news',
        ]);
        PostCategory::create([
            'name' => 'Tutorials',
            'slug' => 'tutorials',
        ]);
        PostCategory::create([
           'name' => 'Videos',
           'slug' => 'videos'
        ]);
    }
}
