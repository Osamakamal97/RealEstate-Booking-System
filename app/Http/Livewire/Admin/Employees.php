<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;

class Employees extends Main
{
    public function render()
    {
        $employees = Admin::employees($this->perPage);
        return view('livewire.employees.sendProblem', ['employees' => $employees])
            ->layout('layouts.dashboard');
    }
}
