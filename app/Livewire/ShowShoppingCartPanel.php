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
        $this->updateShoppingCart();
    }



    public function addProductToCart($data)
    {
        if(!isset($data['product']['id'])) return false;

        $cartItems = session()->get('shopping_cart', []);
        $productId = $data['product']['id'];
        $productExists = false;

        // Iterate through the cart items to check if the product exists
        foreach ($cartItems as &$cartItem) {
            if ($cartItem['id'] === $productId) {
                // Product exists, increment addCount
                $cartItem['addCount'] += 1;
                $productExists = true;
                break; // Exit loop since we found the product
            }
        }
        // If the product does not exist in the cart, add it as a new item
        if (!$productExists) {
            $cartItems[] = $data['product'];
        }


        session()->put('shopping_cart', $cartItems);
        $this->dispatch('updateShoppingCart');
        if(!isset($data['disable-notify'])) {
            $this->dispatch('showCartAddNotify');
        }
        if (auth()->check()) { auth()->user()->saveShoppingCart($cartItems); }
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
        if (auth()->check()) { auth()->user()->saveShoppingCart($this->shoppingCart); }
    }

    public function cleanShoppingCart()
    {
        session()->put('shopping_cart', []);
        $this->dispatch('updateShoppingCart');
        if (auth()->check()) { auth()->user()->saveShoppingCart([]); }
    }

    public function render()
    {
        return view('livewire.show-shopping-cart-panel');
    }
}
