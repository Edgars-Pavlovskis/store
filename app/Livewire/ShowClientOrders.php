<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;

class ShowClientOrders extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Orders::where('email', Auth::user()->email)->orderBy('id', 'desc')->get();
        foreach($this->orders as &$order) {
            $total = 0;
            $items = 0;
            foreach($order['cart'] as $cart) {
                $total += $cart['price'] * $cart['addCount'];
                $items += $cart['addCount'];
            }
            $order['total'] = $total;
            $order['items'] = $items;
        }
    }

    public function render()
    {
        return view('livewire.show-client-orders');
    }
}
