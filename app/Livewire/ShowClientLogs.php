<?php

namespace App\Livewire;
use App\Models\Logs;

use Livewire\Component;

class ShowClientLogs extends Component
{
    public $id;
    public $logs = [];

    public function mount()
    {
        $this->logs = Logs::where('type', 'client')->where('model_id',$this->id)->orderBy('id','DESC')->get();
    }

    public function render()
    {
        return view('livewire.show-client-logs');
    }
}
