<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;

class RealEstateOwners extends Main
{
    public function render()
    {
        $real_estate_owners = User::realEstateOwners($this->perPage);
        return view('livewire.realEstateOwners.index', ['real_estate_owners' => $real_estate_owners]);
    }
}
