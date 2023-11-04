<?php

namespace Database\Seeders;

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
        WhoWorkWith::create([
            'title' => 'Transport & Logistics',
            'slug' => 'transport-and-logistics',
            'featured_image' => 'public/who-work-with/1696803742_transport-and-logistics.jpg',
        ]);
        WhoWorkWith::create([
            'title' => 'Construction Industry',
            'slug' => 'construction-industry',
            'featured_image' => 'public/who-work-with/1696803768_construction.jpg',
        ]);
        WhoWorkWith::create([
            'title' => 'IT, Cyber Security and Service Providers',
            'slug' => 'it-cyber-security-and-service-providers',
            'featured_image' => 'public/who-work-with/1696803835_it-services.jpg',
        ]);
        WhoWorkWith::create([
            'title' => 'Educational & Charity Sectors',
            'slug' => 'educational-charity-sectors',
            'featured_image' => 'public/who-work-with/1696804172_schools-and-charities.jpg',
        ]);
        WhoWorkWith::create([
            'title' => 'Online Retailers',
            'slug' => 'online-retailers',
            'featured_image' => 'public/who-work-with/1696804218_ecommerce-online.jpg',
        ]);
    }
}
