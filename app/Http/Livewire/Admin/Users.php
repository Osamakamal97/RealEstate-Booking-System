<?php

namespace App\Http\Livewire\Admin;

use App\Models\BlockedUsers;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination, LivewireAlert;


    public $show_create = false, $show_edit = false, $showPermissions = false;
    public $search = '', $perPage = 5, $page = 1;
    public $showDeleteNotification = false;

    protected $rules = [
        'name' => 'required|unique:permissions,name',
        'manager_role' => 'required_unless:employee_role,null',
        'employee_role' => 'required_unless:manager_role,null',
    ];

    public function render()
    {
        if ($this->search != null) {
            $users = User::query()
                ->where('name', 'LIKE', "%{$this->search}%")
                ->where('email', 'LIKE', "%{$this->search}%")
                ->indexSelection($this->perPage);
        } else
            $users = User::indexSelection($this->perPage);
        return view('livewire.users.index', ['users' => $users]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->show_edit = false;
        $this->showPermissions = false;
        $this->show_create = true;
    }

    public function store()
    {
        $validate_admin = $this->validate();
        // values in form is 1 or 2, so this convert role index to string
        $role = $this->role == 1 ? 'manager' : 'employee';
        $user = User::create($validate_admin);
        $assign_role = Role::where('name', $role)->get();
        // give this user a role
        $user->assignRole($assign_role);

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
        $user = User::find($id);
        if (!$user)
            session()->flash('error', 'لم يتم إيجاد هذا المسؤول');
        // Fill inputs with data
        $this->admin_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->active = $user->active;
        $this->role = $user->getRoleKey();
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

        $user = User::find($this->admin_id);
        if (!$user)
            session()->flash('error', 'لم يتم إيجاد هذا المسؤول');
        $user->update($validate_admin);
        $role = $this->role == 1 ? 'manager' : 'employee';
        if ($role != $user->getRoleNames()[0]) {
            $assign_role = Role::where('name', $role)->get();
            // this will delete old role and replace it with new role
            $user->syncRoles($assign_role);
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
        $user = User::find($this->admin_id);
        if (!$user)
            session()->flash('error', 'لم يتم إيجاد هذا المسؤول');
        $user->delete();
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

    public function band($id)
    {
        $user = User::find($id);
        if (!$user)
            session()->flash('error', 'لم يتم إيجاد هذا المستخدم');
        BlockedUsers::create(['user_id' => $user->id, 'ip' => $user->ip]);
        $this->alert('success', 'تم حظر الزبون بنجاح', [
            'position'  =>  'center',
            'timer'  =>  2000,
            'toast'  =>  false,
            'showCancelButton'  =>  false,
            'showConfirmButton'  =>  false
        ]);
    }

    // clear inputs
    private function resetInputFields()
    {
        $this->name = '';
        $this->userPermissions = [];
        $this->rolePermissions = [];
        $this->checked_permissions = [];
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
