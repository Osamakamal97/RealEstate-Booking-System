<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Admin\Main;
use App\Models\RealEstate;
use App\Models\RealEstateDetails;
use App\Models\RealEstateFacility;
use Illuminate\Support\Arr;

class RealEstates extends Main
{

    public $name, $type, $address, $postal_code, $google_map_address, $post_in_other_websites, $photos,
        $price, $days_before_cancel_book, $is_cancel_book_free, $discount_percent_when_cancel_book, $bedrooms_number,
        $beds_numbers, $single_beds_numbers, $double_beds_numbers, $bathroom_numbers, $guest_number, $smoke_allow,
        $pets_allow, $kids_allow, $party_allow, $start_arrive_at, $end_arrive_at, $start_leave_at, $end_leave_at,
        $selected_indoor_facilities = [], $selected_outdoor_facilities = [];
    // wedding type variables
    public $space_in_square_meters, $length_in_meter, $width_in_meter, $number_of_people;
    public $types, $real_estate_owner_id;
    public $show_page_one = false,
        $show_page_two = false,
        $show_page_three = false,
        $show_check_form_page = false,
        $show_wedding_hall_page = false,
        $has_wedding_hall_page = false;

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',
        'required_unless' => 'هذا الحقل مطلوب في حال تواجد خصم إلغاء الطلب',
        'numeric' => 'يجب على هذا الحقل اي يكون رقماً.'
    ];

    public function render()
    {
        if ($this->type == 'قاعة أفراح')
            $this->has_wedding_hall_page = true;
        else
            $this->has_wedding_hall_page = false;

        $this->real_estate_owner_id = auth()->user()->id;
        $indoor_facilities = RealEstateFacility::select('id', 'name')->where('place', 'indoor')->get();
        $outdoor_facilities = RealEstateFacility::select('id', 'name')->where('place', 'outdoor')->get();
        $wedding_hall_indoor_facilities = RealEstateFacility::select('id', 'name')->where('place', 'indoor')->get();
        $wedding_hall_outdoor_facilities = RealEstateFacility::select('id', 'name')->where('place', 'outdoor')->get();
        $real_estates = RealEstate::where('user_id', $this->real_estate_owner_id)
            ->paginate($this->perPage);
        return view('livewire.realEstate.index', [
            'real_estates' => $real_estates,
            'indoor_facilities' => $indoor_facilities,
            'outdoor_facilities' => $outdoor_facilities
        ]);
    }

    public function create()
    {
        $this->show_page_one = true;
        $this->resetInputFields();
        $this->types = ['قاعة أفراح', 'استراحة', 'شاليه', 'فيلا', 'شقة مفروشة', 'فندق', 'قارب', 'خيمة فاخرة', 'آخر'];
        $this->show_create = true;
    }

    public function nextPage()
    {
        if ($this->has_wedding_hall_page) {
            if ($this->show_page_one) {
                $this->show_page_one = false;
                $this->show_wedding_hall_page = true;
            } elseif ($this->show_wedding_hall_page) {
                $this->show_wedding_hall_page = false;
                $this->show_page_two = true;
            } elseif ($this->show_page_two) {
                $this->show_page_two = false;
                $this->show_page_three = true;
            } elseif ($this->show_check_form_page) {
                $this->show_page_three = false;
                $this->show_check_form_page = true;
            }
        } else {
            if ($this->show_page_one) {
                $this->show_page_one = false;
                $this->show_page_two = true;
            } elseif ($this->show_page_two) {
                $this->show_page_two = false;
                $this->show_page_three = true;
            } elseif ($this->show_page_three) {
                $this->show_page_three = false;
                $this->show_check_form_page = true;
            }
        }
    }
    public function previousPage()
    {
        if ($this->has_wedding_hall_page) {
            if ($this->show_wedding_hall_page) {
                $this->show_wedding_hall_page = false;
                $this->show_page_one = true;
            } elseif ($this->show_page_two) {
                $this->show_wedding_hall_page = true;
                $this->show_page_two = false;
            } elseif ($this->show_page_three) {
                $this->show_page_two = true;
                $this->show_page_three = false;
            } elseif ($this->show_check_form_page) {
                $this->show_page_three = true;
                $this->show_check_form_page = false;
            }
        } else {
            if ($this->show_page_two) {
                $this->show_page_two = false;
                $this->show_page_one = true;
            } elseif ($this->show_page_three) {
                $this->show_page_two = true;
                $this->show_page_three = false;
            } elseif ($this->show_check_form_page) {
                $this->show_page_three = true;
                $this->show_check_form_page = false;
            }
        }
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
            'days_before_cancel_book' => 'required|integer|between:10,100',
            'is_cancel_book_free' => 'required',
            'discount_percent_when_cancel_book' => 'required_unless:is_cancel_book_free,1|integer|between:10,50',
            'bedrooms_number' => 'required|integer|between:1,10',
            'bathroom_numbers' => 'required|integer|between:1,10',
            'beds_numbers' => 'required|integer|between:1,10',
            'single_beds_numbers' => 'required|integer|between:1,10',
            'double_beds_numbers' => 'required|integer|between:1,10',
            'guest_number' => 'required|integer|between:1,10',
            'smoke_allow' => 'required|in:0,1',
            'pets_allow' => 'required|in:0,1',
            'kids_allow' => 'required|in:0,1',
            'party_allow' => 'required|in:0,1',
            'start_arrive_at' => 'required',
            'end_arrive_at' => 'required',
            'start_leave_at' => 'required',
            'end_leave_at' => 'required',
            'selected_indoor_facilities' => 'required',
            'selected_outdoor_facilities' => 'required',
        ]);
        $indoor_facilities = '';
        $outdoor_facilities = '';
        foreach ($validate_data['selected_indoor_facilities'] as $facility => $bol)
            $indoor_facilities .= $facility . ',';
        foreach ($validate_data['selected_outdoor_facilities'] as $facility => $bol)
            $outdoor_facilities .= $facility . ',';

        $validate_data = Arr::add($validate_data, 'user_id', $this->real_estate_owner_id);
        $real_estate = RealEstate::create($validate_data);
        $validate_data = Arr::add($validate_data, 'real_estate_id', $real_estate->id);
        $validate_data = Arr::add($validate_data, 'indoor_facilities', $indoor_facilities);
        $validate_data = Arr::add($validate_data, 'outdoor_facilities', $outdoor_facilities);
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
