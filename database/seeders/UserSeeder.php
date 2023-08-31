<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'Admin@gmail.com',
            'password'=>bcrypt('admin123'),
        ]);

        $admin_role = Role::create(['name' => 'admin']);
   
        //account
        $permission = Permission::create(['name' => 'Account-view']);
        $permission = Permission::create(['name' => 'Account-edit']);
        $permission = Permission::create(['name' => 'Account-create']);
        $permission = Permission::create(['name' => 'Account-delete']);

        $permission = Permission::create(['name' => 'RolesAccess-view']);
        $permission = Permission::create(['name' => 'RolesAccess-edit']);
        $permission = Permission::create(['name' => 'RolesAccess-create']);
        $permission = Permission::create(['name' => 'RolesAccess-delete']);

        $permission = Permission::create(['name' => 'Orders-view']);
        $permission = Permission::create(['name' => 'Orders-edit']);
        $permission = Permission::create(['name' => 'Orders-create']);
        $permission = Permission::create(['name' => 'Orders-delete']);

        $permission = Permission::create(['name' => 'Service-view']);
        $permission = Permission::create(['name' => 'Service-edit']);
        $permission = Permission::create(['name' => 'Service-create']);
        $permission = Permission::create(['name' => 'Service-delete']);

        $permission = Permission::create(['name' => 'Category-view']);
        $permission = Permission::create(['name' => 'Category-edit']);
        $permission = Permission::create(['name' => 'Category-create']);
        $permission = Permission::create(['name' => 'Category-delete']);

        $permission = Permission::create(['name' => 'Products-view']);
        $permission = Permission::create(['name' => 'Products-edit']);
        $permission = Permission::create(['name' => 'Products-create']);
        $permission = Permission::create(['name' => 'Products-delete']);

        $permission = Permission::create(['name' => 'Specs-view']);
        $permission = Permission::create(['name' => 'Specs-edit']);
        $permission = Permission::create(['name' => 'Specs-create']);
        $permission = Permission::create(['name' => 'Specs-delete']);

        $permission = Permission::create(['name' => 'Designs-view']);
        $permission = Permission::create(['name' => 'Designs-edit']);
        $permission = Permission::create(['name' => 'Designs-create']);
        $permission = Permission::create(['name' => 'Designs-delete']);

        $permission = Permission::create(['name' => 'Models-view']);
        $permission = Permission::create(['name' => 'Models-edit']);
        $permission = Permission::create(['name' => 'Models-create']);
        $permission = Permission::create(['name' => 'Models-delete']);

        $permission = Permission::create(['name' => 'Transac-view']);
        $permission = Permission::create(['name' => 'Transac-edit']);
        $permission = Permission::create(['name' => 'Transac-create']);
        $permission = Permission::create(['name' => 'Transac-delete']);

        $permission = Permission::create(['name' => 'Audit-view']);
        $permission = Permission::create(['name' => 'Audit-edit']);
        $permission = Permission::create(['name' => 'Audit-create']);
        $permission = Permission::create(['name' => 'Audit-delete']);

        $permission = Permission::create(['name' => 'Reports-view']);
        $permission = Permission::create(['name' => 'Reports-edit']);
        $permission = Permission::create(['name' => 'Reports-create']);
        $permission = Permission::create(['name' => 'Reports-delete']);


        $admin->assignRole($admin_role);
        $admin_role->givePermissionTo(Permission::all());
    }
}
