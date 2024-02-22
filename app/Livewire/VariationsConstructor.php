<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\ProductsVariation;
use App\Models\Attributes;

class VariationsConstructor extends Component
{

    public $variations=[];
    public $productID;
    public $attributesData = [];
    public $variationAttributesIDs = [];

    public function mount()
    {
        $this->variations = ProductsVariation::where('products_id', $this->productID)->select('id', 'name', 'variations', 'price', 'stock')->get()->toArray();
        $this->variationAttributesIDs = Products::where('id', $this->productID)->value('variations');
        $attributesData = [];
        foreach($this->variationAttributesIDs as $attribute_id) {
            $attributesData[$attribute_id] = Attributes::where('id', $attribute_id)->select('id', 'name', 'type', 'options')->first();
        }
        $this->attributesData = $attributesData;
    }

    public function addVariation()
    {
        $this->variations[] = ['products_id' => $this->productID, 'name' => '', 'variations' => [], 'price' => 0.00, 'stock' => 0];
    }

    public function deleteVariation($key)
    {
        $variation = $this->variations[$key];
        if(isset($variation['id'])) {
            ProductsVariation::destroy($variation['id']);
        }
        unset($this->variations[$key]);
        $this->dispatch('showNotify', ['message' => __('admin.products.variations.deleted')]);
    }

    public function saveVariations()
    {
        foreach ($this->variations as $variationData) {
            if(isset($variationData['id'])) {
                $variation = ProductsVariation::find($variationData['id']);
                $variation->fill($variationData);
                $variation->save();
            } else {
                $variation = new ProductsVariation($variationData);
                $variation->save();
            }
        }
        $this->dispatch('showSuccess', ['message' => __('admin.products.variations.saved')]);
    }




    public function render()
    {

        return view('livewire.variations-constructor');
    }
}
