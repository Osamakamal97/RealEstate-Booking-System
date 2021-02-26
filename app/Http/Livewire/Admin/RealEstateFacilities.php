<?php

namespace App\Http\Livewire\Admin;

use App\Models\RealEstateFacility;

class RealEstateFacilities extends Main
{
    public $name, $place, $for_wedding_hall, $form_method, $facility_id, $title,
    $notification_message = 'هل تريد حذف المرفق؟ ';

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',
        'unique' => 'اسم المرفق مستخدم مسبقا.',
    ];

    public function render()
    {
        $this->title = __('admin.real_estate_facilities');
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
        $this->form_method = 'store';
        $this->resetInputFields();
        $this->show_form = true;
    }

    public function store()
    {
        $validate_data = $this->validate([
            'name' => 'required|unique:facilities,name',
            'place' => 'required|in:0, 1',
            'for_wedding_hall' => 'required|in:0, 1, 2'
        ]);
        RealEstateFacility::create($validate_data);
        $this->resetInputFields();
        $this->sendAlert('success', 'تم إنشاء العقار بنجاح');
    }

    public function edit($id)
    {
        $facility = RealEstateFacility::select('id', 'name', 'place', 'for_wedding_hall')->find($id);
        $this->resetInputFields();
        $this->facility_id = $id;
        $this->name = $facility->name;
        $this->place = $facility->place;
        $this->for_wedding_hall = $facility->for_wedding_hall;
        $this->form_method = 'update';
        $this->show_form = true;
    }

    public function update()
    {
        $id = $this->facility_id;
        $validate_data = $this->validate([
            'name' => 'required|unique:facilities,name,' . $id,
            'place' => 'required|in:0, 1',
            'for_wedding_hall' => 'required|in:0, 1, 2'
        ]);
        RealEstateFacility::find($id)->update($validate_data);
        $this->resetInputFields();
        $this->sendAlert('success', 'تم تحديث المرفق بنجاح.');
    }

    public function destroy($id)
    {
        $this->facility_id = $id;
        $this->show_delete_notification = true;
    }

    public function deleteConfirm()
    {
        // clear other forms
        $this->resetInputFields();
        $facility = RealEstateFacility::find($this->facility_id);
        if (!$facility)
            $this->sendAlert('error', 'لم يتم إيجاد هذا المرفق');
        $facility->delete();
        $this->show_delete_notification = false;
        $this->sendAlert('success', 'تم حذف المرفق بنجاح');
    }

    public function deleteCancel()
    {
        $this->show_delete_notification = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        // clear inputs
        $this->name = '';
        $this->place = '';
        $this->for_wedding_hall = '';
        $this->filter_id = '';
        $this->resetErrorBag();
        // clear views
        $this->show_form = false;
    }
}
