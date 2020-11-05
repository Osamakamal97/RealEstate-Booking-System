<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Notifications\NotifyUsers as NotificationsNotifyUsers;

class NotifyUsers extends Main
{

    public $title, $content, $can_response;

    public function render()
    {
        return view('livewire.users.notify-users');
    }

    public function send()
    {
        $validate_data = $this->validate([
            'title' => 'required',
            'content' => 'required',
            'can_response' => 'required'
        ]);
        $users = User::all();
        foreach ($users as $user)
            $user->notifyNow(new NotificationsNotifyUsers($validate_data));
        $this->clearInputs();
        $this->sendAlert('success', 'تم إرسال الأشعارات بنجاح.');
    }

    public function clearInputs()
    {
        $this->title = '';
        $this->content = '';
        $this->can_response = '';
        $this->resetValidation();
    }
}
