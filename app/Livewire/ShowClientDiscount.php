<?php

namespace App\Livewire;
use App\Models\User;

use Livewire\Component;

class ShowClientDiscount extends Component
{
    public User $client;

    public function changeStatus($index)
    {
        if(!is_int($index)) return false;
        $this->client->discount = $index;
        $this->client->save();

        createLog($this->client->id, 'client', auth()->user()->name, $text = __('clients.logs-text.discount-changed').' '.config('discounts.list.' . $index . '.title.'.App()->currentLocale(), 'notitle'), $params = []);
    }


    public function render()
    {
        return view('livewire.show-client-discount');
    }
}
