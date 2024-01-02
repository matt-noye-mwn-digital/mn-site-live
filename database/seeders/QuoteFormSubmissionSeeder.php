<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class QuoteFormSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1, 30) as $index){
            DB::table('get_a_quotes')->insert([
                'describe_you' => $faker->sentence,
                'budget' => $faker->numberBetween(1000, 10000),
                'looking_for' => $faker->sentence,
                'pages_required' => $faker->sentence,
                'similar_websites' => $faker->sentence,
                'complete_project_by' => $faker->date,
                'any_other_details' => $faker->sentence,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'company_name' => $faker->company,
                'email_address' => $faker->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'status' => 'unread',
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
