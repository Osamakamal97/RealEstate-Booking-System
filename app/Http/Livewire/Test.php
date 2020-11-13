<?php

namespace App\Http\Livewire;

use App\Models\EmployeeProblems;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Test extends Component
{
    use WithPagination, LivewireAlert;

    // public $name, $email;

    // public $perPage = 10;
    // public $sortField;
    // public $sortAsc = true;
    // public $search = '';
    // public $admins;

    // public $title, $content, $admin_name, $problem_id, $full_send_time;
    // public $show_problem = false, $show_problems = false;


    // public function sortBy($field)
    // {
    //     if ($this->sortField === $field) {
    //         $this->sortAsc = !$this->sortAsc;
    //     } else {
    //         $this->sortAsc = true;
    //     }
    //     $this->sortField = $field;
    // }

    public function render()
    {
    //     $problems = EmployeeProblems::indexSelection($this->perPage);
    //     $this->show_problems = true;
        //     ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        //     ->paginate($this->perPage);
        return view('livewire.test');
    }

    // public function read($problem_id)
    // {
    //     $problem = EmployeeProblems::find($problem_id);
    //     $this->problem_id = $problem_id;
    //     $this->title = $problem->title;
    //     $this->content = $problem->content;
    //     $this->admin_name = $problem->admin->name;
    //     $this->full_send_time = $problem->getFullSendTime();
    //     $this->show_problems = false;
    //     $this->show_problem = true;
    // }

    // public function inbox()
    // {
    //     $this->show_problems = true;
    //     $this->show_problem = false;
    // }

    // public function confirm()
    // {
    //     $this->alert('warning', 'هل تريد حذف هذا المسؤول؟', [
    //         'position'  =>  'center',
    //         'timer'  =>  15000,
    //         'toast'  =>  false,
    //         'showCancelButton'  =>  true,
    //         'showConfirmButton'  =>  true
    //     ]);
    // }

    // public function showModal()
    // {
    //     $this->name = 'asaasddddddddddddddddddddddddddsd';
    //     $this->emit('swal:modal', [
    //         'type'  => 'success',
    //         'title' => 'Success!!',
    //         'text'  => "This is a success message",
    //     ]);
    // }

    // public function showAlert()
    // {
    //     $this->emit('swal:alert', [
    //         'type'    => 'success',
    //         'title'   => 'This is a success alert!!',
    //         'timeout' => 10000
    //     ]);
    // }

    // public function showConfirmation()
    // {
    //     $this->emit("swal:confirm", [
    //         'type'        => 'warning',
    //         'title'       => 'Are you sure?',
    //         'text'        => "You won't be able to revert this!",
    //         'confirmText' => 'Yes, delete!',
    //         'method'      => 'appointments:delete',
    //         'params'      => [], // optional, send params to success confirmation
    //         'callback'    => '', // optional, fire event if no confirmed
    //     ]);
    // }
}
