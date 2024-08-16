<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\AdminMessageFromContacts;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ShowContactsForm extends Component
{
    public $name,$phone,$email,$message;
    public $messageSent = false;

    public function mount()
    {
        // Check if a timestamp exists in the session
        if (Session::has('message_sent_timestamp')) {
            $timestamp = Session::get('message_sent_timestamp');

            // Check if the timestamp is within the last 3 minutes
            if (Carbon::parse($timestamp)->diffInMinutes(now()) < 1) {
                $this->messageSent = true;
            }
        }
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ], [
            'name' => __('validation.contacts.name'),
            'email' => __('validation.contacts.email'),
            'message' => __('validation.contacts.message'),
        ]);

        Mail::to('pakalpojumi@alba-ltd.lv')->queue(new AdminMessageFromContacts($this->name, $this->phone, $this->email, $this->message));
        Session::put('message_sent_timestamp', now());
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->message = '';
        $this->messageSent = true;

    }

    public function render()
    {
        return view('livewire.show-contacts-form');
    }
}
