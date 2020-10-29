<?php

namespace App\Http\Livewire\Admin;

use App\Models\EmployeeProblems;

class Problems extends Main
{
    public $title, $content, $admin_name, $problem_id, $show_full_problem_message = false;

    public function render()
    {
        $problems = EmployeeProblems::indexSelection($this->perPage);
        return view('livewire.employeesProblems.index', ['problems' => $problems])
            ->layout('layouts.dashboard');
    }

    public function read($problem_id)
    {
        $problem = EmployeeProblems::find($problem_id);
        if (!$problem)
            $this->sendAlert('error', 'لم يتم إيجاد هذه الشكوى');
        $this->problem_id = $problem_id;
        $this->title = $problem->title;
        $this->content = $problem->content;
        $this->admin_name = $problem->admin->name;
        $this->show_full_problem_message = true;
        $problem->update(['status' => 1]);
    }
}
