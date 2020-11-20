<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Admins extends Main
{
    use WithPagination, LivewireAlert;

    public $admin_id, $name, $email, $password, $role, $active, $roles;
    public $showPermissions = false, $show_delete_notification = false;
    public $userPermissions = [], $rolePermissions = [], $checked_permissions;

    public function render()
    {

        if ($this->search != null) {
            $admins = Admin::query()
                ->where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('email', 'LIKE', "%{$this->search}%")
                ->orWhere('active', 'LIKE', "%{$this->search}%")
                ->indexSelection($this->perPage);
        } else
            $admins = Admin::indexSelection($this->perPage);
        return view('livewire.admin.index', ['admins' => $admins]);
    }

    public function create()
    {
        $roles = Role::get()->pluck('name')->toArray();
        $this->roles = $roles;
        $this->resetInputFields();
        $this->show_create = true;
    }

    public function store()
    {
        $validate_admin = $this->validate([
            'name' => 'required',
            'email' => "required|email|unique:admins,email",
            'password' => 'required_without:admin_id',
            'role' => 'required',
            'active' => 'required|in:0,1',
        ]);
        // values in form is 1 or 2, so this convert role index to string
        $admin = Admin::create($validate_admin);
        $assign_role = Role::where('name', $validate_admin['role'])->get();
        // give this admin a role
        $admin->assignRole($assign_role);
        // clear other forms
        $this->resetInputFields();
        $this->roles = '';
        $this->sendAlert('success', 'تم إنشاء المسؤول بنجاح');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        if (!$admin)
            $this->sendAlert('error', 'لم يتم إيجاد هذا المسؤول');
        // clear other forms
        $this->resetInputFields();
        // Fill inputs with data
        $roles = Role::get()->pluck('name')->toArray();
        $this->roles = $roles;
        $this->admin_id = $admin->id;
        $this->name = $admin->name;
        $this->email = $admin->email;
        $this->active = $admin->active;
        $this->role = $admin->getRoleNames()[0];
        $this->show_edit = true;
    }

    public function update()
    {
        $validate_admin = $this->validate([
            'name' => 'required',
            'email' => "required|email|unique:admins,email,$this->admin_id",
            'role' => 'required',
            'active' => 'required|in:0,1',
        ]);

        $admin = Admin::find($this->admin_id);
        if (!$admin)
            $this->sendAlert('error', 'لم يتم إيجاد هذا المسؤول');
        $admin->update($validate_admin);
        $assign_role = Role::where('name', $validate_admin['role'])->get();
        // this will delete old role and replace it with new role
        $admin->syncRoles($assign_role);
        // clear fields and views
        $this->resetInputFields();
        $this->roles = '';

        $this->sendAlert('success', 'تم تعديل المسؤول بنجاح');
    }

    public function destroy($id)
    {
        $this->admin_id = $id;
        $this->show_delete_notification = true;
    }

    public function deleteConfirm()
    {
        // clear other forms
        $this->resetInputFields();
        $admin = Admin::find($this->admin_id);
        if (!$admin)
            $this->sendAlert('error', 'لم يتم إيجاد هذا المسؤول');
        $admin->delete();
        $this->show_delete_notification = false;
        $this->sendAlert('success', 'تم حذف المسؤول بنجاح');
    }

    public function deleteCancel()
    {
        $this->show_delete_notification = false;
        $this->resetInputFields();
    }

    // clear inputs and views
    private function resetInputFields()
    {
        // clear inputs
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->active = '';
        $this->userPermissions = [];
        $this->rolePermissions = [];
        $this->checked_permissions = [];
        $this->resetValidation();
        // clear views
        $this->show_create = false;
        $this->show_edit = false;
        $this->showPermissions = false;
        
    }

    // permissions things

    public function permissions($id)
    {
        // clear other forms
        $this->resetInputFields();
        $admin = Admin::find($id);
        if (!$admin)
            $this->sendAlert('error', 'لم يتم إيجاد هذا المسؤول');
        $this->admin_id = $id;
        $role = Role::findByName($admin->getRoleNames()[0], 'admin');
        // role permissions
        $this->rolePermissions = $role->permissions()->get()->pluck('name');
        // user permissions
        $this->userPermissions = $admin->permissions()->get()->pluck('name');

        $this->showPermissions = true;
    }

    public function updatePermissions()
    {
        $admin = Admin::find($this->admin_id);
        if (!$admin)
            $this->sendAlert('error', 'لم يتم إيجاد هذا المسؤول');
        $permissions = collect(array_keys($this->checked_permissions));
        $admin->syncPermissions();
        // because give permissions can take string or array of permissions that can't be
        // assign directly so do that inside array  
        foreach ($permissions as $permission)
            $admin->givePermissionTo($permission);
        $this->resetInputFields();
        $this->sendAlert('success', 'تم تحديث صلاحيات المسؤول بنجاح');
    }
}
