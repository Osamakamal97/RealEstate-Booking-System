<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Admin\Main;
use App\Models\RealEstate;
use App\Models\RealEstateDetails;
use Illuminate\Support\Arr;

class RealEstates extends Main
{
    public $name, $type, $address, $postal_code, $google_map_address, $post_in_other_websites, $photos,
        $price, $days_before_cancel_book, $is_cancel_book_free, $discount_percent_when_cancel_book, $bedrooms_number,
        $beds_numbers, $single_beds_numbers, $double_beds_numbers, $bathroom_numbers, $guest_number, $smoke_allow,
        $pets_allow, $kids_allow, $party_allow, $start_arrive_at, $end_arrive_at, $start_leave_at, $end_leave_at;
    public $types, $real_estate_owner_id;

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',
        'required_unless' => 'هذا الحقل مطلوب في حال تواجد خصم إلغاء الطلب',
        'numeric' => 'يجب على هذا الحقل اي يكون رقماً.'
    ];

    public function render()
    {
        $this->real_estate_owner_id = auth()->user()->id;
        $real_estates = RealEstate::where('user_id', $this->real_estate_owner_id)
            ->paginate($this->perPage);
        return view('livewire.realEstate.index', compact('real_estates'));
    }

    public function create()
    {
        $this->resetInputFields();
        $this->types = ['قاعة أفراح', 'استراحة', 'شاليه', 'فيلا', 'شقة مفروشة', 'فندق', 'قارب', 'خيمة فاخرة', 'اخر'];
        $this->show_create = true;
    }

    public function store()
    {
        $validate_data = $this->validate([
            'name' => 'required',
            'type' => 'required',
            'address' => 'required',
            'postal_code' => 'required|numeric',
            'google_map_address' => 'required',
            'post_in_other_websites' => 'required|in:0,1',
            'photos' => 'required',
            'price' => 'required|numeric',
            'days_before_cancel_book' => 'required',
            'is_cancel_book_free' => 'required',
            'discount_percent_when_cancel_book' => 'required_unless:is_cancel_book_free,1',
            'bedrooms_number' => 'required',
            'bathroom_numbers' => 'required',
            'beds_numbers' => 'required',
            'single_beds_numbers' => 'required',
            'double_beds_numbers' => 'required',
            'guest_number' => 'required',
            'smoke_allow' => 'required',
            'pets_allow' => 'required',
            'kids_allow' => 'required',
            'party_allow' => 'required',
            'start_arrive_at' => 'required',
            'end_arrive_at' => 'required',
            'start_leave_at' => 'required',
            'end_leave_at' => 'required',
        ]);
        // dd($validate_data['smoke_allow']);
        $validate_data = Arr::add($validate_data, 'user_id', $this->real_estate_owner_id);
        $real_estate = RealEstate::create($validate_data);
        $validate_data = Arr::add($validate_data, 'real_estate_id', $real_estate->id);
        $validate_data = Arr::add($validate_data, 'indoor_facilities', 'indoor_facilities');
        $validate_data = Arr::add($validate_data, 'outdoor_facilities', 'outdoor_facilities');
        RealEstateDetails::create($validate_data);
        $this->resetInputFields();
        $this->sendAlert('success', 'تم انشاء العقار بنجاح');
    }

    private function resetInputFields()
    {
        // clear inputs
        $this->name = '';
        $this->type = '';
        $this->address = '';
        $this->postal_code = '';
        $this->google_map_address = '';
        $this->post_in_other_websites = '';
        $this->photos = '';
        $this->price = '';
        $this->days_before_cancel_book = '';
        $this->is_cancel_book_free = '';
        $this->discount_percent_when_cancel_book = '';
        $this->bedrooms_number = '';
        $this->beds_numbers = '';
        $this->single_beds_numbers = '';
        $this->double_beds_numbers = '';
        $this->bathroom_numbers = '';
        $this->guest_number = '';
        $this->smoke_allow = '';
        $this->pets_allow = '';
        $this->kids_allow = '';
        $this->party_allow = '';
        $this->start_arrive_at = '';
        $this->end_arrive_at = '';
        $this->start_leave_at = '';
        $this->end_leave_at = '';
        $this->resetErrorBag();
        // clear views
        $this->show_create = false;
        $this->show_edit = false;
    }
}
