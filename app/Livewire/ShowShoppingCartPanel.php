<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;


class ShowShoppingCartPanel extends Component
{
    protected $listeners = ['updateShoppingCart', 'addProductToCart'];
    public $shoppingCart;
    public $total;

    public function mount()
    {
        //session()->put('shopping_cart', []);
        $this->updateShoppingCart();
    }



    public function addProductToCart($data)
    {
        if(!isset($data['product']['id'])) return false;

        $cartItems = session()->get('shopping_cart', []);
        $cartItems[] = $data['product'];
        session()->put('shopping_cart', $cartItems);
        $this->dispatch('updateShoppingCart');
        $this->dispatch('showCartAddNotify');

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
