<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscribers;

class ShowSubscribe extends Component
{


    public $email,$done;


    public function subscribe()
    {
        $this->validate(
            [
                'email' => 'required|email|unique:subscribers,email',
            ],
            [
                'email.required' => __('frontend.checkout.validation.email'),
                'email.email' => __('frontend.checkout.validation.email'),
                'email.unique' => __('frontend.checkout.validation.emailunique'),
            ]
        );

        Subscribers::create(['email' => $this->email]);
        $this->email = '';
        $this->done = true;
    }


    public function render()
    {
        return view('livewire.show-subscribe');
    }
}
