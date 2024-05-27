<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Attributes;
use App\Models\ProductsVariation;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class DeleteConfirmation extends Component
{
    public $itemId;
    public $itemName;
    public $model; // Controller model
    public $parent;

    protected $listeners = ['confirmDeleteExternal'];


    public function deleteItem()
    {
        switch ($this->model) {
            case "Categories":
                $category = Categories::select('id', 'alias', 'parent_alias', 'image')->where('id', $this->itemId)->first();
                if(isset($category->image)) {
                    $path = "storage/categories/".$category->image;
                    if(is_file($path) && file_exists($path)){ unlink($path); }
                }
                break;

            case "Attributes":

                DB::table('products')
                ->where('parent', $this->parent)
                ->update([
                    'variations' => DB::raw("JSON_REMOVE(variations, JSON_UNQUOTE(JSON_SEARCH(variations, 'one', '".$this->itemId."')))")
                ]);

                DB::table('products_variations')
                ->whereRaw("JSON_CONTAINS_PATH(variations, 'one', '$.\"$this->itemId\"')")
                ->update([
                    'variations' => DB::raw("JSON_REMOVE(variations, '$.\"$this->itemId\"')")
                ]);
                break;


            case "Banner":
                $banner = Banner::select('id', 'type', 'params')->where('id', $this->itemId)->first();
                if(isset($banner->type)) {
                    foreach (config('shop.banners.templates.'.$banner->type.'.params') as $name => $param) {
                        if($param['type'] == "image") {
                            if(isset($banner->params[$name])) {
                                $path = "storage/images/".$banner->params[$name];
                                if(is_file($path) && file_exists($path)){ unlink($path); }
                            }
                        }
                    }
                }
                break;

        }

        $modelInstance = app("App\\Models\\$this->model");
        $modelInstance::find($this->itemId)->delete();


        switch ($this->model) {
            case "Categories":
                return redirect()->route('categories-index', ['alias' => $this->parent]);
                break;

            case "Attributes":
                return redirect()->route('attributes', ['alias' => $this->parent]);
                break;

            case "Products":
                return redirect()->route('categories-index', ['alias' => $this->parent]);
                break;

            case "Orders":
                return redirect()->route('orders-show');
                break;

            case "Banner":
                return redirect()->route('banners-show');
                break;
        }
    }

    public function confirmDeleteExternal($itemId, $itemName, $model, $parent)
    {
        //$model::{$method}($itemId);

        $this->itemId = $itemId;
        $this->itemName = $itemName;
        $this->model = $model;
        $this->parent = $parent;
        $this->dispatch('showConfirmDeleteExternalDialog');
    }


    public function render()
    {
        return view('livewire.delete-confirmation');
    }
}
