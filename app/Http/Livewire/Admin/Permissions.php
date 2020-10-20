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

    public $name, $manager_role, $employee_role;
    public $show_create = false, $show_edit = false, $showPermissions = false;
    public $search = '', $perPage = 5, $page = 1;
    public $showDeleteNotification = false;
    public $userPermissions = [], $rolePermissions = [];

    protected $rules = [
        'name' => 'required',
        'manager_role' => 'required',
        'employee_role' => 'required',
    ];

    public function render()
    {
        // dd(Role::findById(1));
        //     if ($this->search != null) {
        //         $admins = Permission::query()
        //             ->where('name', 'LIKE', "%{$this->search}%")
        //             ->orWhere('email', 'LIKE', "%{$this->search}%")
        //             ->orWhere('active', 'LIKE', "%{$this->search}%")
        //             ->indexSelection($this->perPage);
        //     } else
        $permissions = Permission::select('id', 'name')->get();
        return view('livewire.permissions.index', ['permissions' => $permissions]);

        // return view('livewire.admin.index', ['admins' => $admins]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->show_edit = false;
        // $this->showPermissions = false;
        $this->show_create = true;
    }


    public function store()
    {
        // validate
        $validate_admin = $this->validate();
        // permission name

        // assigned roles

        // values in form is 1 or 2, so this convert role index to string
        $role = $this->role == 1 ? 'manager' : 'employee';
        $admin = Permission::create($validate_admin);
        $assign_role = Role::where('name', $role)->get();
        // give this admin a role
        $admin->assignRole($assign_role);

        $this->resetInputFields();
        $this->show_create = false;

        if ($role == 'manager')
            $this->alert('success', 'تم إنشاء المدير بنجاح', [
                'position'  =>  'center',
                'timer'  =>  2000,
                'toast'  =>  false,
                'text'  =>  'I am a subtext',
                'showCancelButton'  =>  false,
                'showConfirmButton'  =>  false
            ]);
        $this->alert('success', 'تم إنشاء الموظف بنجاح', [
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
        $admin = Permission::find($id);
        if (!$admin)
            session()->flash('error', 'لم يتم إيجاد هذا المسؤول');


        // Fill inputs with data
        $this->admin_id = $admin->id;
        $this->name = $admin->name;
        $this->email = $admin->email;
        $this->active = $admin->active;
        $this->role = $admin->getRoleKey();
        $this->show_create = false;
        $this->showPermissions = false;
        $this->show_edit = true;
    }

    public function update()
    {
        $validate_admin = $this->validate([
            'name' => 'required',
            'email' => "required|email|unique:admins,email,$this->admin_id",
            'role' => 'required|in:1,2',
            'active' => 'required|in:0,1',
        ]);

        $admin = Permission::find($this->admin_id);
        if (!$admin)
            session()->flash('error', 'لم يتم إيجاد هذا المسؤول');
        $admin->update($validate_admin);
        $role = $this->role == 1 ? 'manager' : 'employee';
        if ($role != $admin->getRoleNames()[0]) {
            $assign_role = Role::where('name', $role)->get();
            // this will delete old role and replace it with new role
            $admin->syncRoles($assign_role);
        }
        $this->resetInputFields();
        $this->show_edit = false;

        if ($role == 'manager')
            session()->flash('success', 'تم تعديل المدير بنجاح');
        else
            session()->flash('success', 'تم تعديل الموظف بنجاح');
    }

    public function destroy($id)
    {
        $this->admin_id = $id;
        $this->showDeleteNotification = true;
    }

    public function deleteConfirm()
    {
        $admin = Permission::find($this->admin_id);
        if (!$admin)
            session()->flash('error', 'لم يتم إيجاد هذا المسؤول');
        $admin->delete();
        $this->showDeleteNotification = false;
        $this->alert('success', 'تم حذف المسؤول بنجاح', [
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
        $this->roles = '';
    }

    // permissions things

    public function showPermissions($id)
    {
        $admin = Permission::find($id);
        $admin->givePermissionTo('view');
        // dd($admin);
        Role::findByName('manager', 'admin');
        // role permissions
        // remove permission from role
        // Role::findByName('manager','admin')->revokePermissionTo('edit');
        $role = Role::findByName('manager', 'admin');
        // add permission to role
        // Role::where('name', $admin->getRoleNames()[0])->first()->givePermissionTo('delete');
        // dd(Role::where('name', $admin->getRoleNames()[0])->first()->givePermissionTo('view'));
        // $admin->revokePermissionTo('edit');
        // $admin->syncPermissions(['edit','delete']);
        // view permissions for role
        // dd($role->permissions()->get());
        $this->rolePermissions = $role->permissions()->get()->pluck('name');
        // user permissions
        // dd($admin->permissions());
        $this->userPermissions = $admin->permissions()->get()->pluck('name');
        // clear other forms
        $this->show_create = false;
        $this->show_edit = false;
        $this->showPermissions = true;
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
