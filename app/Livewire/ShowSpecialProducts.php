<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Str;

class ShowSpecialProducts extends Component
{
    public $types = [];
    public $icon = [];
    public $title;
    public $url;
    public $products = [];

    public function mount()
    {
        foreach($this->types as $type => $count)
        {
            if($type == "new") {
                $news = Products::select('id','title','image','price','discount','new','special','code','parent','variations')->where('new', 1)->limit($count)->get()->toArray();
                $this->products = array_merge($this->products, $news??[]);
            }
            if($type == "discount") {
                $discounts = Products::select('id','title','image','price','discount','new','special','code','parent','variations')->where('discount', '>', 0)->limit($count)->get()->toArray();
                $this->products = array_merge($this->products, $discounts??[]);
            }
            if($type == "special") {
                $specials = Products::select('id','title','image','price','discount','new','special','code','parent','variations')->where('special', 1)->limit($count)->get()->toArray();
                $this->products = array_merge($this->products, $specials??[]);
            }
        }
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
        return view('livewire.show-special-products');
    }
}
