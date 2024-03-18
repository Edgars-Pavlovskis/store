<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\Attributes;

class ProductsList extends Component
{
    public $alias;
    public $products = [];
    public $category_attributes = [];
    public $filter = [];
    public $filterMin=0, $filterMax=0;

    public function mount()
    {
        $this->category_attributes = Attributes::whereGroup($this->alias)->whereType('list')->select('id','name','group','options')->get();
        $this->updateProducts();
    }

    public function updateProducts()
    {
        $query = Products::whereParent($this->alias)->whereActive(1);
        if($this->filterMin > 0) $query->where('price', '>=', $this->filterMin);
        if($this->filterMax > 0) $query->where('price', '<=', $this->filterMax);
        $this->products = $query->select('id','title','image','price','code','parent')->get();
        $this->filterMax = $query->orderBy('price', 'desc')->value('price') ?? 0;
        $this->filterMax = is_numeric($this->filterMax) ? ceil($this->filterMax) : 0;
    }

    public function applyFilter($data)
    {
        $this->filterMin = intval($data['filter-price-min'] ?? 0);
        $this->filterMax = intval($data['filter-price-max'] ?? 0);

        $this->updateProducts();

        /*
        $startTime = microtime(true); // Capture start time
        $delay = 1; // Delay in seconds

        while ((microtime(true) - $startTime) < $delay) {
            // This loop intentionally does nothing significant for the delay
        }
        */
    }


    public function render()
    {
        return view('livewire.products-list');
    }
}
