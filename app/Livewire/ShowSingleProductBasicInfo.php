<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\Attributes;
use App\Models\ProductsVariation;

class ShowSingleProductBasicInfo extends Component
{
    public Products $product;
    public $minPrice, $maxPrice;
    public $variations = [];
    public $allAttributes = [];
    public $variationsFilter = [];
    public $selected = [];
    public $attributesAsValues = [];

    public $variationMatch;
    public $addItemCount = 1;

    public function mount()
    {

        $allAttributes = Attributes::whereIn('id', $this->product->variations ?? [])->select('id','name','type','options')->get()->toArray();
        foreach($allAttributes as $attribute)
        {
            $this->allAttributes[$attribute['id']] = $attribute;
            if($attribute['type']=="value") {
                $this->attributesAsValues[$attribute['id']] = [];
            }
        }
        foreach($this->allAttributes as $key => $attribute)
        {
            if($attribute['type']=="value") {
                if(isset($attributesAsValues[$attribute['id']])) $this->allAttributes[$key]['options'] = array_unique($attributesAsValues[$attribute['id']]);
            }
        }

        $this->variations = ProductsVariation::where('products_id', $this->product->id)->select('id','name','variations','price','stock')->get()->toArray();

        foreach($this->variations as $variation)
        {
            foreach($variation['variations'] as $id => $value)
            {
                if(isset($this->attributesAsValues[$id])){
                    $this->attributesAsValues[$id][] = $value;
                }
            }
        }

        //dd($this->variations);
        $this->updateVariations();
    }

    public function updatedAddItemCount()
    {
        if(!is_int(intval($this->addItemCount)) || $this->addItemCount < 1) $this->addItemCount = 1;
    }
    public function addItemCountDec()
    {
        if($this->addItemCount > 1) $this->addItemCount--;
    }
    public function addItemCountInc()
    {
        $this->addItemCount++;
    }

    public function variationSelect($attrID)
    {
        foreach($this->selected as $key => $selected)
        {
            if($selected == "") unset($this->selected[$key]);
        }
        $this->updateVariations();
        //dd($this->selected);
    }


    public function updateVariations()
    {
        $this->variationsFilter = [];
        $this->variationMatch = [];

        $mandatoryIDs = array_values($this->selected);


        foreach($this->variations as $variation)
        {
            $interselected = array_intersect($mandatoryIDs, $variation['variations']);
            if(count($interselected) == count($variation['variations'])) $this->variationMatch = $variation;


            if(count($mandatoryIDs)>1) {
                //if(count($interselected) < count($mandatoryIDs)) continue;
                if(count($interselected)==0) continue;
            }


            if(count($mandatoryIDs) < 2 || count($interselected) > 0) {
                foreach($variation['variations'] as $id => $value)
                {
                    if(!isset($this->variationsFilter[$id])) $this->variationsFilter[$id] = [];
                    if(count($mandatoryIDs) == 1 && count($interselected)==0 && array_key_first($this->selected) != $id) continue;
                    if(count($mandatoryIDs) > 1 && count($mandatoryIDs) != count($interselected)) continue;
                    if(!in_array($value, $this->variationsFilter[$id])) $this->variationsFilter[$id][] = $value;
                }
            }

        }

    }

    public function resetVariations()
    {
        $this->selected = [];
        $this->updateVariations();
    }

    public function resetVariation($id)
    {
        unset($this->selected[$id]);
        $this->updateVariations();
    }

    public function render()
    {
        //$this->product->variations
        return view('livewire.show-single-product-basic-info');
    }
}
