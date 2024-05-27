<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Str;

class ShowCategoryProducts extends Component
{
    public $products = [];
    public $count;
    public $parent;

    public function mount()
    {
        $this->products = Products::select('id','title','image','price','discount','new','special','code','parent','variations')->where('parent', $this->parent)->limit($this->count)->get()->toArray();
        shuffle($this->products);
    }

    public function render()
    {
        return view('livewire.show-category-products');
    }
}
