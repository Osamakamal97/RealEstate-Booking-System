<?php

namespace App\Http\Livewire\Admin;

use App\Models\RealEstateFacility;

class RealEstateFacilities extends Main
{
    public $name, $place;

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',
        'unique' => 'اسم المرفق مستخدم مسبقا.'
    ];

    public function render()
    {
        if ($this->search == null) {
            $facilities = RealEstateFacility::indexSelection($this->perPage);
            return view('livewire.realEstateFacilities.index', compact('facilities'));
        } else {
            $facilities = RealEstateFacility::query()
                ->where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('place', 'LIKE', "%{$this->search}%")
                ->indexSelection($this->perPage);
            return view('livewire.realEstateFacilities.index', compact('facilities'));
        }
    }

    public function create()
    {
        $this->resetInputFields();
        $this->show_create = true;
    }

    public function store()
    {
        $validate_data = $this->validate([
            'name' => 'required|unique:facilities,name',
            'place' => 'required'
        ]);
        RealEstateFacility::create($validate_data);
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        // clear inputs
        $this->name = '';
        $this->place = '';
        $this->resetErrorBag();
        // clear views
        $this->show_create = false;
        $this->show_edit = false;
    }
}
