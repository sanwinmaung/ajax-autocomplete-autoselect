<?php

use Illuminate\Database\Seeder;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $yangon = City::create([
        	'city' => 'Yangon',
        ]);
        $mandalay = City::create([
        	'city' => 'Mandalay',
        ]);
    }
}
