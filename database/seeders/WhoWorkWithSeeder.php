<?php

namespace Database\Seeders;

use App\Models\PagePostSeo;
use App\Models\WhoWorkWith;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhoWorkWithSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WhoWorkWith::create([
            'title' => 'Security Industry',
            'slug' => 'security-industry',
            'featured_image' => 'public/who-work-with/1696803717_security-industry.jpg',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Security Industry',
            'www_id' => 1,
        ]);
        WhoWorkWith::create([
            'title' => 'Transport & Logistics',
            'slug' => 'transport-and-logistics',
            'featured_image' => 'public/who-work-with/1696803742_transport-and-logistics.jpg',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Transport & Logistics',
            'www_id' => 2,
        ]);
        WhoWorkWith::create([
            'title' => 'Construction Industry',
            'slug' => 'construction-industry',
            'featured_image' => 'public/who-work-with/1696803768_construction.jpg',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Contruction Industry',
            'www_id' => 3,
        ]);
        WhoWorkWith::create([
            'title' => 'IT, Cyber Security and Service Providers',
            'slug' => 'it-cyber-security-and-service-providers',
            'featured_image' => 'public/who-work-with/1696803835_it-services.jpg',
        ]);
        PagePostSeo::create([
            'seo_title' => 'IT, Cyber Security and Service Providers',
            'www_id' => 4,
        ]);
        WhoWorkWith::create([
            'title' => 'Educational & Charity Sectors',
            'slug' => 'educational-charity-sectors',
            'featured_image' => 'public/who-work-with/1696804172_schools-and-charities.jpg',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Educational & Charity Sectors',
            'www_id' => 5,
        ]);
        WhoWorkWith::create([
            'title' => 'Online Retailers',
            'slug' => 'online-retailers',
            'featured_image' => 'public/who-work-with/1696804218_ecommerce-online.jpg',
        ]);
        PagePostSeo::create([
            'seo_title' => 'Online Retailers',
            'www_id' => 6,
        ]);
    }
}
