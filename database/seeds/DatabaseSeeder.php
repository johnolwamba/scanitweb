<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StationTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
