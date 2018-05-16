<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::firstOrCreate([
            'name' => 'Admin'
        ]);

        $admin_permissions = [
            'add-staff',
            'view-staff',
            'delete-staff',
            'update-product',
            'add-product'
        ];

        foreach ($admin_permissions as $admin_permission){

            if(!$admin->hasPermissionTo($admin_permission)) {
                $admin->givePermissionTo($admin_permission);
            }
        }

        $user = User::firstOrCreate([
            'name' => 'System Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret')
        ]);

        if(!$user->hasRole($admin)){
            $user->assignRole($admin);
        }



        //add staff
        $staff = Role::firstOrCreate([
            'name' => 'Staff'
        ]);

        $staff_permissions = [
            'view-staff',
            'update-product',
            'add-product'
        ];

        foreach ($staff_permissions as $staff_permission){
            if(!$staff->hasPermissionTo($staff_permission)) {
                $staff->givePermissionTo($staff_permission);
            }
        }

        $user = User::firstOrCreate([
            'name' => 'Staff User',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('secret')
        ]);

        if(!$user->hasRole($staff)){
            $user->assignRole($staff);
        }

        $staff_id = User::where('email','=','staff@gmail.com')->first();
        $staff_add = new \App\Staff();
        $staff_add->station_id = 1;
        $staff_add->user_id = $staff_id->id;
        $staff_add->save();


        //add customer
        $customer_role = Role::firstOrCreate([
            'name' => 'Customer'
        ]);
        $user = User::firstOrCreate([
            'name' => 'Customer User',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('secret')
        ]);

        if(!$user->hasRole($customer_role)){
            $user->assignRole($customer_role);
        }
        $customer_id = User::where('email','=','customer@gmail.com')->first();
        $customer = new \App\Customer();
        $customer->user_id = $customer_id->id;
        $customer->phone_number = "+254718694198";
        $customer->save();

    }
}
