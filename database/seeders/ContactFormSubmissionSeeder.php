<?php

namespace Database\Seeders;

use App\Models\ContactFormSubmissions;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactFormSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 30) as $index) {
            DB::table('contact_form_submissions')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email_address' => $faker->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'company_name' => $faker->company,
                'reason_for_contacting' => $faker->sentence,
                'how_did_you_hear_about_me' => $faker->sentence,
                'your_message' => $faker->sentence,
                'status' => 'unread',
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
