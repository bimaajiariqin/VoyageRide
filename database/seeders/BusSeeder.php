<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bus;
use Carbon\Carbon;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample buses
        Bus::create([
            'name' => 'Sinar Jaya',
            'bus_type' => 'Executive',
            'seat_capacity' => 48,
            'bus_number' => 'SJ-1234',
            'model' => 'Mercedes Benz OH 1626',
            'logo_url' => '/images/sinar-jaya.png',
            'origin' => 'Jakarta',
            'destination' => 'Bandung',
            'departure_time' => Carbon::now()->addDays(1)->setTime(8, 0),
            'arrival_time' => Carbon::now()->addDays(1)->setTime(11, 30),
            'price' => 150000,
            'has_luggage' => true,
            'has_light' => true,
            'has_ac' => true,
            'has_drink' => true,
            'has_wifi' => true,
            'has_usb' => true,
            'has_cctv' => true,
        ]);

        Bus::create([
            'name' => 'Pahala Kencana',
            'bus_type' => 'Super Executive',
            'seat_capacity' => 36,
            'bus_number' => 'PK-5678',
            'model' => 'Scania K410',
            'logo_url' => '/images/pahala-kencana.png',
            'origin' => 'Jakarta',
            'destination' => 'Bandung',
            'departure_time' => Carbon::now()->addDays(1)->setTime(9, 0),
            'arrival_time' => Carbon::now()->addDays(1)->setTime(12, 0),
            'price' => 180000,
            'has_luggage' => true,
            'has_light' => true,
            'has_ac' => true,
            'has_drink' => true,
            'has_wifi' => true,
            'has_usb' => true,
            'has_cctv' => false,
        ]);

        // Add more sample buses as needed
    }
}