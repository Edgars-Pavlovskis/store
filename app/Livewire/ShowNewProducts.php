<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Str;

class ShowNewProducts extends Component
{
    public $products = [];
    public $count;

    public function mount()
    {
        $this->products = Products::select('id','title','image','price','discount','new','special','code','parent','variations')->where('new', 1)->limit($this->count)->get()->toArray();
        shuffle($this->products);
    }


    public function fastAddProductToCart($product_id)
    {
        $product = Products::whereId($product_id)->first();
        if($product->id) {
            $data = array();
            $data['product'] = array(
                'key' => Str::random(5) . '-' . time(),
                'id' => $product['id'],
                'title' => $product['title'],
                'image' => $product['image'],
                'code' => $product['code'],
                'inner_code' => $product['inner_code'],
                'price' => $product['price']-($product['price'] * ($product['discount']/100)),
                'discount' => $product['discount'],
                'parent' => $product['parent'],
                'stock' => $product['stock'],
                'variation' => [],
                'addCount' => 1,
            );
            $this->dispatch('addProductToCart', data: $data);
        }
    }


    public function render()
    {
        return view('livewire.show-new-products');
    }
}
