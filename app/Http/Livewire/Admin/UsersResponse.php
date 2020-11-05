<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;

class UsersResponse extends Main
{
    public $show_problem = false, $show_problems = false;

    public function render()
    {
        $this->show_problems = true;
        $responses = Admin::find(1)->notifications;
        return view('livewire.users-response', ['responses' => $responses]);
    }
}
