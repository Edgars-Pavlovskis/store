<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\ProductsVariation;
use App\Models\Attributes;
use App\Models\VariationsTranslation;

class VariationsConstructor extends Component
{

    public $variations=[];
    public $productID;
    public $attributesData = [];
    public $variationAttributesIDs = [];
    public $originalPrice;

    public function mount()
    {
        $this->variations = ProductsVariation::where('products_id', $this->productID)->select('id', 'name', 'description', 'variations', 'price', 'stock')->get()->toArray();
        $this->variationAttributesIDs = Products::where('id', $this->productID)->value('variations');
        $this->originalPrice = Products::where('id', $this->productID)->value('price');
        $attributesData = [];
        foreach($this->variationAttributesIDs ?? [] as $attribute_id) {
            $attributesData[$attribute_id] = Attributes::where('id', $attribute_id)->select('id', 'name', 'type', 'options')->first();
        }
        $this->attributesData = $attributesData;


        foreach($this->variations as $key => $variation) {
            $translationData = VariationsTranslation::where('products_variations_id', $variation['id'])->get();
            $translated = [];
            foreach($translationData as $data) {
                $translated[$data->locale]['name'] = $data['name'];
                $translated[$data->locale]['description'] = $data['description'];
            }
            $name = [];
            $description = [];
            $name[getDefaultLocale()] = $variation['name'];
            $description[getDefaultLocale()] = $variation['description'];
            foreach(getLocalesWithoutDefault() as $locale)
            {
                $name[$locale] = (isset($translated[$locale]['name'])) ? $translated[$locale]['name'] : '';
                $description[$locale] = (isset($translated[$locale]['description'])) ? $translated[$locale]['description'] : '';
            }
            $this->variations[$key]['name'] = $name;
            $this->variations[$key]['description'] = $description;
        }

    }

    public function addVariation()
    {
        $name = [];
        $description = [];
        foreach(getLocales() as $locale)
        {
            $name[$locale] = '';
            $description[$locale] = '';
        }
        $this->variations[] = ['products_id' => $this->productID, 'name' => $name, 'description' => $description, 'variations' => [], 'price' => number_format($this->originalPrice,2), 'stock' => 0];
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
        //dd($this->variations);
        foreach ($this->variations as $variationData) {
            $namesArray = $variationData['name'];
            $descriptionsArray = $variationData['description'];
            $variationData['name'] = $namesArray[getDefaultLocale()];
            $variationData['description'] = $descriptionsArray[getDefaultLocale()];
            $variationData['price'] = (int)$variationData['price']??0;
            unset($namesArray[getDefaultLocale()]);
            unset($descriptionsArray[getDefaultLocale()]);

            if(isset($variationData['id'])) {
                $variation = ProductsVariation::find($variationData['id']);
                $variation->fill($variationData);
                $variation->save();
            } else {
                $variation = new ProductsVariation($variationData);
                $variation->save();
            }

            foreach(getLocalesWithoutDefault() as $locale)
            {
                if((!isset($namesArray[$locale]) || $namesArray[$locale] == "") && (!isset($descriptionsArray[$locale]) || $descriptionsArray[$locale] == "")) continue;
                $vt = VariationsTranslation::updateOrCreate(
                    ['products_variations_id' => $variationData['id'], 'locale' => $locale],
                    [
                        'products_variations_id' => $variationData['id'],
                        'locale' => $locale,
                        'name' => isset($namesArray[$locale]) ? $namesArray[$locale] : '',
                        'description' => isset($descriptionsArray[$locale]) ? $descriptionsArray[$locale] : '',
                    ]
                );
            }

        }
        $this->dispatch('showSuccess', ['message' => __('admin.products.variations.saved')]);
    }




    public function render()
    {

        return view('livewire.variations-constructor');
    }
}
