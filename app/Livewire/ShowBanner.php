<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Banner;
use App\Models\Products;

class ShowBanner extends Component
{
    public $type;
    public $limit;
    public $banner = [];
    public $banners = [];


    public function mount()
    {
        if($this->type == "top-product") {
            $this->banner = Banner::where('type',$this->type)->inRandomOrder()->first();
            if($this->banner) {
                $product = Products::select('id','title','code','price','discount','image')->where('inner_code', $this->banner->params['product-code']??'')->first();
                $this->banner->params = $product??[];
            }
        } else if($this->type == "counter") {
            $this->banner = Banner::where('type',$this->type)->inRandomOrder()->first();
        } else {
            $this->banners = Banner::where('type',$this->type)->limit($this->limit??1)->get();
        }
    }



    public function render()
    {
        return view('livewire.show-banner');
    }
}
