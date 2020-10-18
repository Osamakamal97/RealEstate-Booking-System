<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Test extends Component
{
    use WithPagination, LivewireAlert;

    public $name, $email;

    // protected $rules = [
    //     'name' => 'required|min:6',
    //     'email' => 'required|email',
    // ];

    public $perPage = 10;
    public $sortField;
    public $sortAsc = true;
    public $search = '';
    public $admins;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function render()
    {
        // $this->admins = \App\Models\Admin::search($this->search)
        //     ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        //     ->paginate($this->perPage);
        return view('livewire.test');
    }

    public function confirm()
    {
        $this->alert('warning', 'هل تريد حذف هذا المسؤول؟', [
            'position'  =>  'center',
            'timer'  =>  150000,
            'toast'  =>  false,
            'showCancelButton'  =>  true,
            'showConfirmButton'  =>  true
        ]);
    }

    public function showModal()
    {
        $this->name = 'asaasddddddddddddddddddddddddddsd';
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Success!!',
            'text'  => "This is a success message",
        ]);
    }

    public function showAlert()
    {
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'This is a success alert!!',
            'timeout' => 10000
        ]);
    }

    public function showConfirmation()
    {
        $this->emit("swal:confirm", [
            'type'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, delete!',
            'method'      => 'appointments:delete',
            'params'      => [], // optional, send params to success confirmation
            'callback'    => '', // optional, fire event if no confirmed
        ]);
    }
}
