<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Attributes;

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
                    if(file_exists($path)){ unlink($path); }
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
        }
    }

    public function confirmDeleteExternal($itemId, $itemName, $model, $parent)
    {
        //$model::{$method}($itemId);

        $this->itemId = $itemId;
        $this->itemName = $itemName;
        $this->model = $model;
        $this->parent = $parent;
    }


    public function render()
    {
        return view('livewire.delete-confirmation');
    }
}
