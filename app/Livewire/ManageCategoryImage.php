<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categories;

class ManageCategoryImage extends Component
{
    public $category;

    public function deleteImage()
    {
        $path = "storage/categories/".$this->category->image;
        if(file_exists($path)){
            unlink($path);
        }
        $this->category->image = '';
        $this->category->save();
        $this->render();
    }


    public function render()
    {
        return view('livewire.manage-category-image');
    }
}
