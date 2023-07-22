<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Seat;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Seat::create([
            'seat_number'=> '1a'
        ]);
        Seat::create([
            'seat_number'=> '1b'
        ]);
        Seat::create([
            'seat_number'=> '1c'
        ]);
        Seat::create([
            'seat_number'=> '2a'
        ]);
        Seat::create([
            'seat_number'=> '2b'
        ]);
        Seat::create([
            'seat_number'=> '2c'
        ]);
        Flight::create([
            'flight_number' => 'MA-234'
        ]);
        Flight::create([
            'flight_number' => 'QZ-908'
        ]);
        Passenger::create([
            'fname' => 'Rony',
            'lname' => 'Kordahi',
            'email' => 'r@k.gmail.com'
        ]);
        Passenger::create([
            'fname' => 'Tony',
            'lname' => 'Fordahi',
            'email' => 't@f.gmail.com'
        ]);
    }
}
