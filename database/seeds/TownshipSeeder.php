<?php

use Illuminate\Database\Seeder;
use App\Township;

class TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ahlone = Township::create([
        	'city_id' => 1,
        	'township' => 'Ahlone',
        ]);
        $bahan = Township::create([
        	'city_id' => 1,
        	'township' => 'Bahan',
        ]);
        $insein = Township::create([
        	'city_id' => 1,
        	'township' => 'Insein',
        ]);
        $hlaing = Township::create([
        	'city_id' => 1,
        	'township' => 'Hlaing',
        ]);
        $sanchaung = Township::create([
        	'city_id' => 1,
        	'township' => 'Sanchaung',
        ]);

        $amarapura = Township::create([
        	'city_id' => 2,
        	'township' => 'Amarapura',
        ]);
        $aungmyaethazan = Township::create([
        	'city_id' => 2,
        	'township' => 'Aungmyaethazan',
        ]);
        $chanayethazan = Township::create([
        	'city_id' => 2,
        	'township' => 'Chanayethazan',
        ]);
        $kyaukpadaung = Township::create([
        	'city_id' => 2,
        	'township' => 'Kyaukpadaung',
        ]);
        $meikhtila = Township::create([
        	'city_id' => 2,
        	'township' => 'Meikhtila',
        ]);
    }
}
