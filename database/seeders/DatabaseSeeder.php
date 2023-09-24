<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ContactFormSubmissions;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            WhatIDoSeeder::class,
            PostCategoriesSeeder::class,
            PostTagSeeder::class,
            KnowledgebaseCategorySeeder::class,
            SettingSeeder::class,
        ]);
    }
}
