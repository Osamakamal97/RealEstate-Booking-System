<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;

class RealEstateOwners extends Main
{

    public $title, $first_name, $last_name, $email, $country, $mobile_number, $type = 1, $route_name,
        $mobile_number_country_code, $password, $password_confirmation, $real_estate_owner;

    public function __construct(String $title)
    {
        $this->title = $title;
        $this->route_name = $title;
    }

    public function rules()
    {
        // digits_between:6,10
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'country' => 'required',
            'mobile_number' => 'required|string|min:8|max:10|unique:users,mobile_number,' . $this->id,
            'mobile_number_country_code' => 'required',
            'password' => 'required_if:is_create,true|confirmed',
        ];
    }

    public function render()
    {
        // This title for table title in index page
        $this->title = 'real_estate_owners';
        $this->route_name = 'realEstateOwners';
        $real_estate_owners = User::realEstateOwners($this->perPage);
        return view('livewire.realEstateOwners.index', compact('real_estate_owners'));
    }

    public function create()
    {
        $this->show_create = true;
    }

    public function store()
    {
        $validate_real_estate_owner = $this->validate();
        $validate_real_estate_owner['type'] = '1';
        User::create($validate_real_estate_owner);
        $this->resetInputFields();
        $this->sendAlert('success', __('notification.success_create_real_estate_owner'));
    }

    public function edit(User $user)
    {
        $this->show_edit = true;
        $this->first_name =  $user->first_name;
        $this->last_name =  $user->last_name;
        $this->email =  $user->email;
        $this->country =  $user->country;
        $this->mobile_number =  $user->mobile_number;
        $this->mobile_number_country_code =  $user->mobile_number_country_code;
        $this->real_estate_owner = $user;
        $this->id = $user->id;
    }

    public function update(User $user)
    {
        $validate_real_estate_owner = $this->validate();
        $user->update($validate_real_estate_owner);
        $this->resetInputFields();
        $this->sendAlert('success', __('notification.success_update_real_estate_owner'));
    }

    public function destroy(User $user)
    {
        $this->real_estate_owner = $user;
        $this->notification_message = __('notification.delete_real_estate_owner');
        $this->show_delete_notification = true;
    }

    public function changeStatus(User $user)
    {
        if ($user->status == 1)
            $user->update(['status' => 0]);
        else
            $user->update(['status' => 1]);
        $this->sendAlert('success', __('notification.success_update_status_real_estate_owner'));

    }

    public function deleteConfirm()
    {
        // clear other forms
        $this->resetInputFields();
        // if (!$user)
        //     $this->sendAlert('error', 'لم يتم إيجاد هذا المسؤول');
        $this->real_estate_owner->delete();
        $this->show_delete_notification = false;
        $this->sendAlert('success', 'تم حذف المسؤول بنجاح');
    }

    public function deleteCancel()
    {
        $this->show_delete_notification = false;
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->first_name =  '';
        $this->last_name =  '';
        $this->email =  '';
        $this->country =  '';
        $this->mobile_number =  '';
        $this->mobile_number_country_code =  '';
        $this->password =  '';
        $this->password_confirmation =  '';
        $this->show_create = false;
        $this->show_edit = false;
    }
}
