<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;

class ManageProductImage extends Component
{
    public $product;

    public function deleteImage()
    {
        $path = "storage/products/".$this->product->image;
        if(file_exists($path)){
            unlink($path);
        }
        $this->product->image = '';
        $this->product->save();
        $this->render();
    }


    public function render()
    {
        return view('livewire.manage-product-image');
    }
}
