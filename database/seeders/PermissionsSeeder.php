<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // permissions for customers
        $customerPermissions = ['edit_customer'=>'Edit Customer',
            'view_customer'=>'View Customer',
            'delete_customer'=>'Delete Customer',
            'create_customer'=>'Create Customer'];

        // permissions for products
        $productPermissions = ['edit_product'=>'Edit Product',
            'view_product'=>'View Product',
            'delete_product'=>'Delete Product',
            'create_product'=>'Create Product'];


        $allpermissions = array_merge($customerPermissions, $productPermissions);

        foreach ($allpermissions as $name => $description) {
            \App\Models\Permission::updateOrCreate(
                ['name' => $name],
                ['guard_name' => 'web',
                'description' => $description]
            );
        }


    }





}
