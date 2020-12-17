<?php

namespace App\Http\Livewire\Admin;

use App\Models\RealEstate;
use App\Models\RealEstateDetails;
use App\Models\RealEstateFacility;

class RealEstates extends Main
{
    public $real_estate_id, $real_estate_data, $real_estate_details_data, $facilities;
    public $show_real_estate_data = false;

    public function render()
    {
        $real_estates = RealEstate::paginate($this->perPage);
        return view('livewire.realEstates.index', ['real_estates' => $real_estates]);
    }

    public function show($id)
    {
        $this->real_estate_data = RealEstate::find($id);
        $this->real_estate_id = $id;
        $this->real_estate_details_data = RealEstateDetails::where('real_estate_id', $this->real_estate_data->id)->first();
        $this->facilities = RealEstateFacility::select('id', 'name')->get();
        $this->show_real_estate_data = true;
    }

    public function accept($id)
    {
        RealEstate::find($id)->update(['confirmed' => 1]);
        $this->show_real_estate_data = false;
        $this->sendAlert('success', 'تمت الموافقة على العقار');
    }

    public function reject($id)
    {
        RealEstate::find($id)->update(['confirmed' => 0]);
        $this->show_real_estate_data = false;
        $this->sendAlert('error', 'تمت الرفض على العقار');
    }
}
