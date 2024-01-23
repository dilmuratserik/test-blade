<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class FlightSeeder extends Seeder
{
    public function run()
    {
        Flight::create([
            'from' => 'VKO',
            'to' => 'DME',
            'depart' => '2020-01-01 12:44:00',
            'arrival' => '2020-01-01 13:44:00',
        ]);

        Flight::create([
            'from' => 'DME',
            'to' => 'JFK',
            'depart' => '2020-01-02 23:00:00',
            'arrival' => '2020-01-03 11:44:00',
        ]);

        Flight::create([
            'from' => 'DME',
            'to' => 'HKT',
            'depart' => '2020-01-01 13:40:00',
            'arrival' => '2020-01-01 22:22:00',
        ]);
    }
}

