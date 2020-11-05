<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;

class Profile extends Main
{
    public $admin_id;

    public function render()
    {
        $this->admin_id = auth()->id();
        $admin = Admin::find($this->admin_id);
        return view('livewire.profile.index', ['admin' => $admin]);
    }
}
