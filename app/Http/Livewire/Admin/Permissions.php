<?php

namespace App\Http\Livewire\Admin;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Main
{
    use WithPagination, LivewireAlert;

    public $name, $real_estate_owner_role = false, $admin_role = false, $permission_id = 0;
    public $show_delete_notification = false;
    public $user_permissions = [], $role_permissions = [];

    protected $rules = [
        'name' => 'required|unique:permissions,name',
        'real_estate_owner_role' => 'required_unless:admin_role,null',
        'admin_role' => 'required_unless:real_estate_owner_role,null',
    ];

    public function render()
    {
        if ($this->search != null) {
            $permissions = Permission::query()
                ->where('name', 'LIKE', "%{$this->search}%")
                ->paginate($this->perPage);
        } else
            $permissions = Permission::select('id', 'name')->paginate($this->perPage);
        return view('livewire.permissions.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->show_edit = false;
        $this->show_create = true;
    }

    // real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        // validate
        $this->validate();
        // create permission
        $this->admin_role == true ? $permission = Permission::create(['name' => $this->name, 'guard_name' => 'admin']) : '';
        $this->real_estate_owner_role == true ? $permission = Permission::create(['name' => $this->name, 'guard_name' => 'web']) : '';
        // give permissions to roles
        Role::findByName('super-admin', 'admin')->givePermissionTo($permission);
        // clear inputs
        $this->resetInputFields();
        $this->show_create = false;
        // alert
        $this->sendAlert('success', 'تم إنشاء الصلاحية بنجاح');
    }

    public function edit($id)
    {
        $this->resetInputFields();

        $permission = Permission::findById($id, 'admin');
        if (!$permission)
            $this->sendAlert('error', 'لم يتم ايجاد هذا المسؤول');
        $this->permission_id = $id;
        // Fill inputs with data
        $this->name = $permission->name;
        $related_roles = $permission->roles()->get()->pluck('name')->toArray();
        if (in_array('manager', $related_roles)) {
            $this->real_estate_owner_role = true;
        }
        if (in_array('employee', $related_roles))
            $this->admin_role = true;
        $this->show_create = false;
        $this->showPermissions = false;
        $this->show_edit = true;
    }

    public function update()
    {
        // validation
        $this->validate(['name' => 'required|unique:permissions,name,' . $this->permission_id]);
        // get permission
        $permission = Permission::find($this->permission_id);
        if (!$permission)
            session()->flash('error', 'لم يتم إيجاد هذا المسؤول');
        // update permission name
        $permission->update(['name' => $this->name]);
        // update permissions for employee
        if ($this->admin_role) {
            $role = Role::findByName('employee', 'admin');
            $role->hasPermissionTo($permission) ? '' : $role->givePermissionTo($permission);
        } else {
            Role::findByName('employee', 'admin')->revokePermissionTo($permission);
        }
        // update permissions for manager
        if ($this->real_estate_owner_role) {
            $role = Role::findByName('manager', 'admin');
            $role->hasPermissionTo($permission) ? '' : $role->givePermissionTo($permission);
        } else {
            Role::findByName('manager', 'admin')->revokePermissionTo($permission);
        }
        // clear fields and views
        $this->resetInputFields();
        $this->show_edit = false;
        $this->sendAlert('success', 'تم تعديل الصلاحية بنجاح');
    }

    public function destroy($id)
    {
        $this->permission_id = $id;
        $this->show_create = false;
        $this->show_edit = false;
        $this->show_delete_notification = true;
    }

    public function deleteConfirm()
    {
        $permission = Permission::find($this->permission_id);
        if (!$permission)
            session()->flash('error', 'لم يتم إيجاد هذا المسؤول');
        $permission->delete();
        $this->show_delete_notification = false;
        $this->sendAlert('success', 'تم حذف الصلاحية بنجاح');
    }

    public function deleteCancel()
    {
        $this->show_delete_notification = false;
    }

    // clear inputs
    private function resetInputFields()
    {
        $this->name = '';
        $this->real_estate_owner_role = false;
        $this->admin_role = false;
        $this->resetValidation();
    }
}
