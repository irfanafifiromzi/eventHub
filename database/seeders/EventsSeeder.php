<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            'eventName' => 'Tech Conference',
            'eventDescription' => 'An annual conference for tech enthusiasts.',
            'eventLocation' => 'Convention Center',
            'eventCategory' => 'Technology',
            'eventStartDate' => '2023-01-15',
            'eventEndDate' => '2023-01-17',
            'eventStartTime' => '09:00:00',
            'eventEndTime' => '17:00:00',
            'eventPrice' => 100.00,
            'eventCapacity' => 30,
            'eventStatus' => 'Confirmed',
            'email' => 'irfan@gmail.com', // Assuming this email exists in the 'users' table
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('events')->insert([
            'eventName' => 'Music Festival',
            'eventDescription' => 'A weekend of live music performances.',
            'eventLocation' => 'Outdoor Arena',
            'eventCategory' => 'Music',
            'eventStartDate' => '2023-03-10',
            'eventEndDate' => '2023-03-12',
            'eventStartTime' => '18:00:00',
            'eventEndTime' => '23:00:00',
            'eventPrice' => 150.00,
            'eventCapacity' => 50,
            'eventStatus' => 'Confirmed',
            'email' => 'mirza@gmail.com', // Assuming this email exists in the 'users' table
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
