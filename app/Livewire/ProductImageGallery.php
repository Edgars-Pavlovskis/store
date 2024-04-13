<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Facades\File;

class ProductImageGallery extends Component
{
    public $id;
    public $galleryImages = [];
    public $productGallery;
    public $linkedProduct;
    public $linked = false;
    public $linkID;

    public function removeGallery($path='')
    {
        if(file_exists(public_path($path))){
            unlink(public_path($path));
            $this->render();
        }
    }

    public function linkGallery()
    {
        if(strlen($this->linkID)>0 && is_int(intval($this->linkID))) {
            $parent = Products::whereId($this->linkID)->select('id')->first();
            if(isset($parent->id)){
                $product = Products::whereId($this->id)->first();
                $product->gallery = $parent->id;
                $product->save();
                $this->linked = true;
                unset($this->linkID);
                $this->alert('success',__('admin.Gallery linked to product', ['title' => $product->title]));
            } else {
                $this->linked = true;
                unset($this->linkID);
                $this->alert('warning',__('admin.Product ID not found'));
            }
        }
    }


    public function unlinkGallery()
    {
        $product = Products::whereId($this->id)->first();
        $product->gallery = null;
        $product->save();
        $this->linked = false;
        $this->alert('info',__('admin.Gallery unlinked'));
    }


    public function render()
    {
        $this->linked = false;
        $this->productGallery = Products::whereId($this->id)->value('gallery') ?? '';
        if(strlen($this->productGallery)>0) {
            $this->linkedProduct = Products::whereId($this->productGallery)->select('id', 'title', 'inner_code')->first();
            $this->linked = isset($this->linkedProduct->id);
            if(!$this->linked) $this->unlinkGallery();
        }
        $this->galleryImages = File::glob(public_path('storage/products-gallery/'.($this->linked?$this->linkedProduct->id:$this->id).'/*'));
        foreach ($this->galleryImages as $key=>$path) {
            $path = str_replace(public_path(), '', $path);
            $this->galleryImages[$key] = str_replace("\\", '/', $path);
        }
        return view('livewire.product-image-gallery');
    }
}
