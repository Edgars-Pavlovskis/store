<?php

namespace App\Livewire;
use App\Models\Orders;
use App\Models\Logs;

use Livewire\Component;

class ShowOrderStatus extends Component
{
    public Orders $order;

    public function changeStatus($index)
    {
        if(!is_int($index)) return false;
        $this->order->status = $index;
        $this->order->save();

        createLog($this->order->id, 'order', auth()->user()->name, $text = __('orders.logs-text.status-changed').' '.__('orders.status.'.$index), $params = []);
    }

    public function render()
    {

        return view('livewire.show-order-status');
    }
}
