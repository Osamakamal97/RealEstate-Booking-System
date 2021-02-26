<?php

namespace App\Http\Livewire\Admin;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Main
{

    public $role_id, $name, $role_permissions = [], $selected_permission, $permission_search = '', $title,
        $permission_name = '', $show_delete_notification = false, $show_delete_permission_notification = false;

    public function render()
    {
        $this->title = 'roles';
        if ($this->search == null)
            $roles = Role::select('id', 'name')->paginate(5);
        else
            $roles = Role::select('id', 'name')
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->paginate(5);

        $permissions = Permission::select('name')
            ->where('name', 'LIKE', '%' . $this->permission_search . '%')
            ->get()->pluck('name')->toArray();
        if ($this->selected_permission != null || $this->role_permissions != null) {
            if ($this->selected_permission != null) {
                array_push($this->role_permissions, $this->selected_permission);
                $this->permission_search = '';
                $this->selected_permission = '';
            }
            $permissions = array_diff($permissions, $this->role_permissions);
        }
        return view('livewire.roles.index', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->show_create = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        // values in form is 1 or 2, so this convert role index to string
        $admin = Role::create(['name' => $this->name, 'guard_name' => 'admin']);
        $admin->syncPermissions($this->role_permissions);
        // clear other forms
        $this->resetInputFields();
        $this->sendAlert('success', 'تم إنشاء الدور بنجاح');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        if (!$role)
            $this->sendAlert('error', 'لم يتم إيجاد هذا الدور.');
        // clear other forms
        $this->resetInputFields();
        $this->role_permissions = $role->permissions->pluck('name')->toArray();
        // Fill inputs with data
        $this->role_id = $role->id;
        $this->name = $role->name;
        $this->show_edit = true;
    }

    public function updatePermission($permission)
    {
        $this->permission_name = $permission;
        $col = collect($this->role_permissions);
        $col = $col->filter(function ($value, $key) {
            return $value != $this->permission_name;
        });
        $this->permission_name = $permission;
        $this->role_permissions = $col->toArray();
    }

    public function updatePermissionConfirm()
    {
        $role = Role::find($this->role_id);
        $role->revokePermissionTo($this->permission_name);
        $this->sendAlert('success', 'تم تعديل صلاحيات الدور بنجاح');
        $this->resetInputFields();
    }

    public function updatePermissionCancel()
    {
        $this->resetInputFields();
    }

    public function update()
    {
        $validate_admin = $this->validate([
            'name' => 'required',
        ]);
        $role = Role::find($this->role_id);
        // dd($role);
        if (!$role)
            $this->sendAlert('error', 'لم يتم إيجاد هذا المسؤول');
        $role->update($validate_admin);
        $role->syncPermissions($this->role_permissions);
        // clear fields and views
        $this->resetInputFields();
        if ($role == 'manager')
            $this->sendAlert('success', 'تم تعديل المدير بنجاح');
        else
            $this->sendAlert('success', 'تم تعديل الموظف بنجاح');
    }

    public function destroy($id)
    {
        $this->role_id = $id;
        $this->show_delete_notification = true;
    }

    public function deleteConfirm()
    {
        // clear other forms
        $admin = Role::find($this->role_id);
        if (!$admin)
            $this->sendAlert('error', 'لم يتم إيجاد هذا الدور');
        $admin->delete();
        $this->resetInputFields();
        $this->sendAlert('success', 'تم حذف الدور بنجاح');
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
        $this->role_id = '';
        $this->selected_permission = '';
        $this->role_permissions = [];
        $this->resetValidation();
        // clear views
        $this->show_create = false;
        $this->show_edit = false;
        $this->showPermissions = false;
        $this->show_delete_permission_notification = false;
        $this->show_delete_notification = false;
    }
}
