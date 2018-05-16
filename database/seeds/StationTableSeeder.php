<?php

use Illuminate\Database\Seeder;
use App\Station;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $station = new Station();
        $station->name = 'Station 1';
        $station->save();

        $station = new Station();
        $station->name = 'Station 2';
        $station->save();

        $station = new Station();
        $station->name = 'Station 3';
        $station->save();

        $station = new Station();
        $station->name = 'Station 4';
        $station->save();

    }
}
