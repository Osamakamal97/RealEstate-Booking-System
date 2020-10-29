<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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
        Permission::create(['name' => 'block_user', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_users', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_employees', 'guard_name' => 'admin']);
        Permission::create(['name' => 'update_employee_permissions', 'guard_name' => 'admin']);
        Permission::create(['name' => 'update_employee', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_employee', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_employee_problems', 'guard_name' => 'admin']);
        Permission::create(['name' => 'send_messages_to_manager', 'guard_name' => 'admin']);

        $admin_role->givePermissionTo([
            'block_user',
            'view_users',
            'view_employees',
            'update_employee_permissions',
            'update_employee',
            'delete_employee',
            'view_employee_problems',
        ]);

        $manager_role->givePermissionTo([
            'view_users',
            'view_employees',
            'update_employee'
        ]);

        $employee_role->givePermissionTo([
            'send_messages_to_manager',
        ]);

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
