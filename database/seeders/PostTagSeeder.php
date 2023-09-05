<?php

namespace Database\Seeders;

use App\Models\PostTags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostTags::create([
           'name' => 'Laravel',
           'slug' => 'laravel'
        ]);
        PostTags::create([
            'name' => 'Web Development',
            'slug' => 'web-development',
        ]);
        PostTags::create([
            'name' => 'Web Hosting',
            'slug' => 'web-hosting',
        ]);
        PostTags::create([
           'name' => 'Tutorial',
           'slug' => 'tutorial',
        ]);
    }
}
