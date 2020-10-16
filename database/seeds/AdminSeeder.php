<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create(['name' => 'super-admin', 'guard_name' => 'admin']);
        $manager_role = Role::create(['name' => 'manager', 'guard_name' => 'admin']);
        $employee_role = Role::create(['name' => 'employee', 'guard_name' => 'admin']);
        $admin = Admin::create(['name' => 'Osama', 'email' => 'osama@example.com', 'password' => 'password']);
        $admin->assignRole($admin_role);
        $admin = Admin::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => 'password']);
        $admin->assignRole($admin_role);
        $admin = Admin::create(['name' => 'Manager', 'email' => 'manager@example.com', 'password' => 'password']);
        $admin->assignRole($manager_role);
        $admin = Admin::create(['name' => 'Employee', 'email' => 'employee@example.com', 'password' => 'password']);
        $admin->assignRole($employee_role);
    }
}
