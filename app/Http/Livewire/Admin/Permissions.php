<?php

namespace App\Http\Livewire\Admin;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Component
{

    use WithPagination, LivewireAlert;

    public $name, $manager_role = false, $employee_role = false, $permission_id = 0;
    public $show_create = false, $show_edit = false, $showPermissions = false;
    public $search = '', $perPage = 5, $page = 1;
    public $showDeleteNotification = false;
    public $userPermissions = [], $rolePermissions = [];

    protected $rules = [
        'name' => 'required|unique:permissions,name',
        'manager_role' => 'required_unless:employee_role,null',
        'employee_role' => 'required_unless:manager_role,null',
    ];

    public function render()
    {
        // dd(Role::findById(1));
        if ($this->search != null) {
            $permissions = Permission::query()
                ->where('name', 'LIKE', "%{$this->search}%")
                ->get();
        } else
            $permissions = Permission::select('id', 'name')->get();
        return view('livewire.permissions.index', ['permissions' => $permissions]);

        // return view('livewire.permission.index', ['permissions' => $permissions]);
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
        $permission = Permission::create(['name' => $this->name, 'guard_name' => 'admin']);
        // give permissions to roles
        Role::findByName('super-admin', 'admin')->givePermissionTo($permission);
        $this->employee_role == true ? Role::findByName('employee', 'admin')->givePermissionTo($permission) : '';
        $this->manager_role == true ? Role::findByName('manager', 'admin')->givePermissionTo($permission) : '';
        // clear inputs
        $this->resetInputFields();
        $this->show_create = false;

        $this->alert('success', 'تم إنشاء الصلاحية بنجاح', [
            'position'  =>  'center',
            'timer'  =>  2000,
            'toast'  =>  false,
            'text'  =>  'I am a subtext',
            'showCancelButton'  =>  false,
            'showConfirmButton'  =>  false
        ]);
    }

    public function edit($id)
    {
        $this->resetInputFields();

        $permission = Permission::findById($id, 'admin');
        if (!$permission)
            $this->alert('error', 'لم يتم ايجاد هذا المسؤول', [
                'position'  =>  'center',
                'timer'  =>  2000,
                'toast'  =>  false,
                'text'  =>  'I am a subtext',
                'showCancelButton'  =>  false,
                'showConfirmButton'  =>  false
            ]);
        $this->permission_id = $id;
        // Fill inputs with data
        $this->name = $permission->name;
        $related_roles = $permission->roles()->get()->pluck('name')->toArray();
        if (in_array('manager', $related_roles)) {
            $this->manager_role = true;
        }
        if (in_array('employee', $related_roles))
            $this->employee_role = true;
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
        if ($this->employee_role) {
            $role = Role::findByName('employee', 'admin');
            $role->hasPermissionTo($permission) ? '' : $role->givePermissionTo($permission);
        } else {
            Role::findByName('employee', 'admin')->revokePermissionTo($permission);
        }
        // update permissions for manager
        if ($this->manager_role) {
            $role = Role::findByName('manager', 'admin');
            $role->hasPermissionTo($permission) ? '' : $role->givePermissionTo($permission);
        } else {
            Role::findByName('manager', 'admin')->revokePermissionTo($permission);
        }
        // clear fields and views
        $this->resetInputFields();
        $this->show_edit = false;
        $this->alert('success', 'تم تعديل الصلاحية بنجاح', [
            'position'  =>  'center',
            'timer'  =>  2000,
            'toast'  =>  false,
            'showCancelButton'  =>  false,
            'showConfirmButton'  =>  false
        ]);
    }

    public function destroy($id)
    {
        $this->permission_id = $id;
        $this->show_create = false;
        $this->show_edit = false;
        $this->showDeleteNotification = true;
    }

    public function deleteConfirm()
    {
        $permission = Permission::find($this->permission_id);
        if (!$permission)
            session()->flash('error', 'لم يتم إيجاد هذا المسؤول');
        $permission->delete();
        $this->showDeleteNotification = false;
        $this->alert('success', 'تم حذف الصلاحية بنجاح', [
            'position'  =>  'center',
            'timer'  =>  2000,
            'toast'  =>  false,
            'showCancelButton'  =>  false,
            'showConfirmButton'  =>  false
        ]);
    }

    public function deleteCancel()
    {
        $this->showDeleteNotification = false;
    }

    // clear inputs
    private function resetInputFields()
    {
        $this->name = '';
        $this->manager_role = false;
        $this->employee_role = false;
    }

    // pagination things
    public function previousPage()
    {
        $this->page = $this->page - 1;
    }

    public function nextPage()
    {
        $this->page = $this->page + 1;
    }

    public function gotoPage($page)
    {
        $this->page = $page;
    }
}
