<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use App\Models\Products;
use App\Models\Attributes;
use App\Models\ProductsAttribute;

class ProductsList extends Component
{
    public $alias;
    public Collection $products;
    public $category_attributes = [];
    public $filter = [];
    public $filterMin=0, $filterMax=0;
    public $maxPriceUpdated = false;

    public $perLoadCount;
    public $isLoading = false;



    public function mount()
    {
        $this->products = collect([]);
        $this->perLoadCount = config('shop.frontend.products.per-load');
        //$this->category_attributes = Attributes::whereGroup($this->alias)->whereType('list')->select('id','name','group','options')->get()->toArray();
        $this->category_attributes = Attributes::whereGroup($this->alias)->select('id','name','type','group','options')->get()->toArray();
        $this->filterMax = Products::whereParent($this->alias)->whereActive(1)->orderBy('price', 'desc')->value('price') ?? 0;
        if(!$this->filterMax) $this->filterMax = 0;
        $this->filterMax = ceil($this->filterMax);
        $this->updateProducts();

        foreach ($this->category_attributes as &$attribute) {
            if($attribute['type'] == "value") {
                $attribute['options'] = ProductsAttribute::where('attributes_id', $attribute['id'])->distinct()->pluck('value')->toArray();
            }
            $first = reset($attribute['options']);
            asort($attribute['options'], (intval($first) > 0) ? SORT_NUMERIC : SORT_STRING);

        }
        $hashMap = [];
        foreach ($this->category_attributes as $item) {
            $hashMap[$item['id']] = $item;
        }
        $this->category_attributes = $hashMap;
        //dd($this->category_attributes);
    }

    public function addMoreProducts()
    {
        $this->updateProducts();
    }

    public function updateProducts()
    {

        $products = Products::whereParent($this->alias)->whereActive(1);


        // Collect checked attribute IDs and values
        $checkedAttributes = [];

        foreach ($this->filter as $attributeId => $attributeValues) {
            foreach ($attributeValues as $attributeValue => $checked) {
                if ($checked) {
                    if(!array_is_list($attributeValues)){
                        $checkedAttributes[$attributeId][] = $attributeValue;
                    } else {

                        if(isset($this->category_attributes[$attributeId])) {
                            //dd($this->category_attributes[$attributeId]);
                            if(isset($this->category_attributes[$attributeId]['options'][$attributeValue])) {
                                $checkedAttributes[$attributeId][] = $this->category_attributes[$attributeId]['options'][$attributeValue];
                            }
                        }
                    }
                }
            }
        }

        if(count($checkedAttributes)>0) {
            //dd($checkedAttributes);

            foreach ($checkedAttributes as $attributeId => $attributeValues) {
                $products->whereHas('attributes', function ($query) use ($attributeId, $attributeValues) {
                    $query->where('attributes_id', $attributeId)
                          ->whereIn('value', $attributeValues);
                });
            }
        }

        if($this->filterMin > 0) $products->where('price', '>=', $this->filterMin);
        if($this->maxPriceUpdated) $products->where('price', '<=', $this->filterMax);

        $count = count($this->products);
        $newProducts = $products->select('id','title','image','price','code','parent')->limit($this->perLoadCount)->offset($count)->get();
        $this->products = $this->products->merge($newProducts);
        $this->isLoading = false;
        //if(count($this->products)==0) dd($products->toSql());
    }

    public function applyFilter($data)
    {
        $this->isLoading = true;
        $this->products = collect([]); // resetting previously loaded products, as we are applying new filter and query will be changed.

        $this->filterMin = intval($data['filter-price-min'] ?? 0);
        $filterMax = intval($data['filter-price-max'] ?? 0);
        if($this->filterMax != $filterMax) {
            $this->maxPriceUpdated = true;
        }
        $this->filterMax = $filterMax;

        $this->updateProducts();

        /*
        $startTime = microtime(true); // Capture start time
        $delay = 1; // Delay in seconds

        while ((microtime(true) - $startTime) < $delay) {
            // This loop intentionally does nothing significant for the delay
        }
        */
    }

    public function resetFilter()
    {
        $this->filter = [];
        $this->updateProducts();
    }


    public function render()
    {
        return view('livewire.products-list');
    }
}
