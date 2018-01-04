<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'add-staff',
            'view-staff',
            'delete-staff',
            'update-product',
            'add-product'
        ];

        foreach ($permissions as $permission){
            $new_permission = Permission::firstOrCreate(['guard_name' => 'web','name' => $permission]);
        }
    }
}
