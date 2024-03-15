<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;

class ProductsList extends Component
{
    public $alias;
    public $products = [];

    public function mount()
    {
        $this->products = Products::whereParent($this->alias)->whereActive(1)->select('id','title','image','price','parent')->get();
    }

    public function render()
    {
        return view('livewire.products-list');
    }
}
