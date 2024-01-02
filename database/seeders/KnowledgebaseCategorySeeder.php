<?php

namespace Database\Seeders;

use App\Models\KnowledgebaseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KnowledgebaseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KnowledgebaseCategory::create([
            'name' => 'uncategorised',
            'slug' => 'uncategories',
        ]);
        KnowledgebaseCategory::create([
            'name' => 'WordPress',
            'slug' => 'wordpress',
        ]);
        KnowledgebaseCategory::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);
        KnowledgebaseCategory::create([
            'name' => 'Advanced Custom Fields (ACF)',
            'slug' => 'advanced-custom-fields-acf',
        ]);
        KnowledgebaseCategory::create([
            'name' => 'Web Hosting',
            'slug' => 'web-hosting',
        ]);
    }
}
