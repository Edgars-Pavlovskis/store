<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;

class ProductImageGallery extends Component
{
    public $id;
    public $galleryImages = [];

    public function removeGallery($path='')
    {
        if(file_exists(public_path($path))){
            unlink(public_path($path));
            $this->render();
        }
    }

    public function render()
    {
        $this->galleryImages = File::glob(public_path('storage/products-gallery/'.$this->id).'/*');
        foreach ($this->galleryImages as $key=>$path) {
            $path = str_replace(public_path(), '', $path);
            $this->galleryImages[$key] = str_replace("\\", '/', $path);
        }
        return view('livewire.product-image-gallery');
    }
}
