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
        $real_estate_owner = Role::create(['name' => 'realEstateOwner', 'guard_name' => 'web']);
        Permission::create(['name' => 'block_user', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_users', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_employees', 'guard_name' => 'admin']);
        Permission::create(['name' => 'update_employee_permissions', 'guard_name' => 'admin']);
        Permission::create(['name' => 'update_employee', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_employee', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_employee_problems', 'guard_name' => 'admin']);
        Permission::create(['name' => 'send_messages_to_manager', 'guard_name' => 'admin']);
        Permission::create(['name' => 'notify_users', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_users_notifications', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_real_estate_owners', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create_real_estate_owner', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit_real_estate_owner', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_real_estate_owner', 'guard_name' => 'admin']);
        Permission::create(['name' => 'block_real_estate_owner', 'guard_name' => 'admin']);
        // Real Estate Permissions
        Permission::create(['name' => 'view_real_estates', 'guard_name' => 'web']);

        $admin_role->givePermissionTo([
            'block_user',
            'view_users',
            'view_employees',
            'update_employee_permissions',
            'update_employee',
            'delete_employee',
            'view_employee_problems',
            'notify_users',
            'view_users_notifications',
            'view_real_estate_owners',
            'create_real_estate_owner',
            'edit_real_estate_owner',
            'delete_real_estate_owner',
            'block_real_estate_owner',
            // '',
        ]);

        $manager_role->givePermissionTo([
            'view_users',
            'view_employees',
            'update_employee'
        ]);

        $employee_role->givePermissionTo([
            'send_messages_to_manager',
        ]);

        $real_estate_owner->givePermissionTo([
            'view_real_estates'
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
