<?php

namespace App\Http\Livewire\Admin;

use App\Models\EmployeeProblems;

class Problems extends Main
{
    public $title, $content, $admin_name, $problem_id, $full_send_time, $show_full_problem_message = false;
    public $show_problem = false, $show_problems = false;

    public function render()
    {
        $problems = EmployeeProblems::indexSelection($this->perPage);
        $this->show_problems = true;
        return view('livewire.employeesProblems.index', ['problems' => $problems])
            ->layout('layouts.dashboard');
    }

    public function inbox()
    {
        $this->show_problems = true;
        $this->show_problem = false;
    }

    public function mainPage()
    {
        $this->show_problems = true;
        $this->show_problem = false;
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
        $this->full_send_time = $problem->getFullSendTime();
        $this->show_problems = false;
        $this->show_problem = true;
        $problem->update(['status' => 1]);
    }
}
