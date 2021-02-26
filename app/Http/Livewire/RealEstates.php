<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Admin\Main;
use App\Models\RealEstate;
use App\Models\RealEstateDetails;
use App\Models\RealEstateFacility;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;

class RealEstates extends Main
{
    use WithFileUploads;
    public $form_method, $real_estate_id;
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
        $show_page_four = false,
        $show_check_form_page = false,
        $show_wedding_hall_page = false,
        $has_wedding_hall_page = false;

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',
        'required_unless' => 'هذا الحقل مطلوب في حال تواجد خصم إلغاء الطلب',
        'numeric' => 'يجب على هذا الحقل اي يكون رقماً.'
    ];
    public $table_name = 'real_estates';


    protected $rules = [
        'name' => 'required',
        'type' => 'required',
        'address' => 'required',
        'postal_code' => 'required|numeric',
        'google_map_address' => 'required',
        'post_in_other_websites' => 'required|in:0,1',
        'photos' => 'required', //|image
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
    ];

    public function render()
    {
        if ($this->type == 'قاعة أفراح')
            $this->has_wedding_hall_page = true;
        else
            $this->has_wedding_hall_page = false;

        $this->real_estate_owner_id = auth()->user()->id;
        $indoor_facilities = RealEstateFacility::select('id', 'name')->where('place', '0')
            ->where('for_wedding_hall', '0')->get();
        // dd($indoor_facilities);
        $outdoor_facilities = RealEstateFacility::select('id', 'name')->where('place', '1')->get();

        $wedding_hall_indoor_facilities = RealEstateFacility::select('id', 'name')->where('place', '0')
            ->where('for_wedding_hall', '1')
            ->where('for_wedding_hall', '2')
            ->get();
        $wedding_hall_outdoor_facilities = RealEstateFacility::select('id', 'name')->where('place', '1')
            ->where('for_wedding_hall', '1')
            ->where('for_wedding_hall', '2')
            ->get();
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
        // $this->selected_indoor_facilities = [];
        // dd($this->selected_indoor_facilities);
        $this->show_page_one = true;
        $this->resetInputFields();
        $indoor_facilities = RealEstateFacility::select('id', 'name')->where('place', '0')
            ->where('for_wedding_hall', '0')->get();
        $outdoor_facilities = RealEstateFacility::select('id', 'name')->where('place', '1')->get();

        foreach ($indoor_facilities as $key => $value)
            $this->selected_indoor_facilities[$key] = false;
        foreach ($outdoor_facilities as $key => $value)
            $this->selected_outdoor_facilities[$key] = false;
        $this->types = ['قاعة أفراح', 'استراحة', 'شاليه', 'فيلا', 'شقة مفروشة', 'فندق', 'قارب', 'خيمة فاخرة', 'آخر'];
        $this->show_form = true;
        $this->form_method = 'store';
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
            'photos' => 'required', //|image
            'price' => 'required|numeric',
            'days_before_cancel_book' => 'required|integer|between:1,100',
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
        $facilities = RealEstateFacility::all();
        $indoor_facilities = '';
        $outdoor_facilities = '';
        foreach ($validate_data['selected_indoor_facilities'] as $key => $val)
            if ($val == true)
                $indoor_facilities .= $facilities[$val]->id . ',';
        foreach ($validate_data['selected_outdoor_facilities'] as $key => $val)
            if ($val == true)
                $outdoor_facilities .= $facilities[$key]->id . ',';
        $validate_data = Arr::add($validate_data, 'user_id', $this->real_estate_owner_id);
        $real_estate = RealEstate::create($validate_data);
        $validate_data = Arr::add($validate_data, 'real_estate_id', $real_estate->id);
        $validate_data = Arr::add($validate_data, 'indoor_facilities', $indoor_facilities);
        $validate_data = Arr::add($validate_data, 'outdoor_facilities', $outdoor_facilities);
        RealEstateDetails::create($validate_data);
        $this->resetInputFields();
        $this->sendAlert('success', 'تم انشاء العقار بنجاح');
    }

    public function edit($id)
    {
        $real_estate = RealEstate::find($id);
        $this->real_estate_id = $real_estate->id;
        $real_estate_details = RealEstateDetails::where('real_estate_id', $real_estate->id)->first();
        // start fill inputs
        $this->name = $real_estate->name;
        $this->type = $real_estate->type;
        $this->address = $real_estate->address;
        $this->postal_code = $real_estate->postal_code;
        $this->google_map_address = $real_estate->google_map_address;
        $this->post_in_other_websites = $real_estate->post_in_other_websites;
        $this->photos = $real_estate->photos;
        $this->price = $real_estate->price;
        $this->days_before_cancel_book = $real_estate->days_before_cancel_book;
        $this->is_cancel_book_free = $real_estate->is_cancel_book_free;
        $this->discount_percent_when_cancel_book = $real_estate->discount_percent_when_cancel_book;
        $this->bedrooms_number = $real_estate_details->bedrooms_number;
        $this->beds_numbers = $real_estate_details->beds_numbers;
        $this->single_beds_numbers = $real_estate_details->single_beds_numbers;
        $this->double_beds_numbers = $real_estate_details->double_beds_numbers;
        $this->bathroom_numbers = $real_estate_details->bathroom_numbers;
        $this->guest_number = $real_estate_details->guest_number;
        $this->smoke_allow = $real_estate_details->smoke_allow;
        $this->pets_allow = $real_estate_details->pets_allow;
        $this->kids_allow = $real_estate_details->kids_allow;
        $this->party_allow = $real_estate_details->party_allow;
        $this->start_arrive_at = $real_estate_details->start_arrive_at;
        $this->end_arrive_at = $real_estate_details->end_arrive_at;
        $this->start_leave_at = $real_estate_details->start_leave_at;
        $this->end_leave_at = $real_estate_details->end_leave_at;
        $this->selected_indoor_facilities = '';
        $this->selected_outdoor_facilities = '';
        // end fill inputs
        $this->show_page_one = true;
        // need to be in a database
        $this->types = ['قاعة أفراح', 'استراحة', 'شاليه', 'فيلا', 'شقة مفروشة', 'فندق', 'قارب', 'خيمة فاخرة', 'آخر'];
        $this->show_form = true;
        $this->form_method = 'update';
    }

    public function update()
    {
        $data = $this->validate();
        dd($data['selected_outdoor_facilities']);
        $real_estate = RealEstate::find($this->real_estate_id)->first();
        dd($real_estate);
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
                $this->show_page_four = true;
            } elseif ($this->show_page_four) {
                $this->show_page_four = false;
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
                $this->show_page_three = false;
                $this->show_page_two = true;
            } elseif ($this->show_page_four) {
                $this->show_page_four = false;
                $this->show_page_three = true;
            } elseif ($this->show_check_form_page) {
                $this->show_check_form_page = false;
                $this->show_page_four = true;
            }
        }
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
        $this->selected_indoor_facilities = [];
        $this->selected_outdoor_facilities = [];
        $this->resetErrorBag();
        // clear views
        $this->show_create = false;
        $this->show_edit = false;
    }
}
