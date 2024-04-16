<?php

namespace App\Livewire;

use Livewire\Component;

class ShowShoppingCartPanel extends Component
{
    protected $listeners = ['updateShoppingCart'];
    public $shoppingCart;
    public $total;

    public function mount()
    {
        $this->updateShoppingCart();
    }
    public function updateShoppingCart()
    {
        $this->shoppingCart = session()->get('shopping_cart', []);
        $this->total = array_reduce($this->shoppingCart, function($carry, $product) {
            return $carry + ($product['price'] * intval($product['addCount']));
        }, 0);
    }

    public function removeItemFromCart($key)
    {
        $this->shoppingCart = session()->get('shopping_cart', []);
        foreach($this->shoppingCart as $index => $cart)
        {
            if($cart['key'] == $key){
                unset($this->shoppingCart[$index]);
                break;
            }
        }
        session()->put('shopping_cart', $this->shoppingCart);
        $this->dispatch('updateShoppingCart');
    }

    public function cleanShoppingCart()
    {
        session()->put('shopping_cart', []);
        $this->dispatch('updateShoppingCart');
    }

    public function render()
    {
        return view('livewire.show-shopping-cart-panel');
    }
}
