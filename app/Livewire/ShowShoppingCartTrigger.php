<?php

namespace App\Livewire;

use Livewire\Component;

class ShowShoppingCartTrigger extends Component
{
    protected $listeners = ['updateShoppingCart', 'showCartAddNotify'];
    public $shoppingCart;

    public function mount()
    {
        $this->updateShoppingCart();
    }

    public function updateShoppingCart()
    {
        $this->shoppingCart = session()->get('shopping_cart', []);
    }

    public function showCartAddNotify()
    {
        $this->dispatch('CartAddNotify');
    }

    public function render()
    {
        return view('livewire.show-shopping-cart-trigger');
    }
}
