<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Str;

class ShowProductsSearch extends Component
{

    public $query;
    public $found;
    public $products = [];
    public $perLoad = 5;
    public $showMoreButton = false;

    public function search()
    {
        if(strlen(trim($this->query)) < 3) return false;
        $products = Products::select('id','title','image','price','discount','new','special','code','parent','variations')->search($this->query)->get();
        $this->found = count($products);
        $this->products = $products->take($this->perLoad);
        if($this->found > 0 && $this->found > $this->perLoad) $this->showMoreButton = true; else $this->showMoreButton = false;
    }

    public function loadMore()
    {
        $this->perLoad = $this->perLoad + 5;
        $this->search();
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
            $data['disable-notify'] = true;
            $this->dispatch('addProductToCart', data: $data);
        }
    }

    public function render()
    {
        return view('livewire.show-products-search');
    }
}
