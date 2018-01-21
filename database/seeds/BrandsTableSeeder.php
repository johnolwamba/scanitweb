<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new \App\Brand();
        $brand->name = 'Brand 1';
        $brand->save();

        $brand = new \App\Brand();
        $brand->name = 'Brand 2';
        $brand->save();

        $brand = new \App\Brand();
        $brand->name = 'Brand 3';
        $brand->save();

        $brand = new \App\Brand();
        $brand->name = 'Brand 4';
        $brand->save();

    }
}
