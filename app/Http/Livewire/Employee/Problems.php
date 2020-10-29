<?php

namespace App\Http\Livewire\Employee;

use App\Models\EmployeeProblems;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Problems extends Component
{
    use LivewireAlert;

    public $admin_id, $title, $content;

    public function render()
    {
        $this->admin_id = auth('admin')->id();
        return view('livewire.employee.sendProblem')
            ->layout('layouts.dashboard');
    }

    public function send()
    {
        $validated_data = $this->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $validated_data = collect($validated_data);
        $validated_data->put('admin_id', $this->admin_id);
        EmployeeProblems::create($validated_data->toArray());
        $this->clearInputs();
        $this->alert('success', 'تم إرسال الشكوى بنجاح', [
            'position'  =>  'center',
            'timer'  =>  2000,
            'toast'  =>  false,
            'showCancelButton'  =>  false,
            'showConfirmButton'  =>  false
        ]);
    }


    public function clearInputs()
    {
        $this->title = '';
        $this->content = '';
    }
}
