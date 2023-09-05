<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Matt',
            'last_name' => 'Noye',
            'email' => 'hello@matt-noye.co.uk',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ])->assignRole('admin');
    }
}
