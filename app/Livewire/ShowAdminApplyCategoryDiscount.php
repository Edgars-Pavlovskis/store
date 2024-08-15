<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;

class ShowAdminApplyCategoryDiscount extends Component
{
    public $alias;
    public $discount;

    public function applyDiscount()
    {
        if(!is_numeric($this->discount)) $this->discount = 0;
        $this->discount = max(0, min($this->discount, 100));
        if($this->discount == 0) {
            Products::where('parent', $this->alias)->update(['discount' => $this->discount]);
        } else {
            Products::where('parent', $this->alias)->where('discount', '<', $this->discount)->update(['discount' => $this->discount]);
        }
        return redirect(request()->header('Referer'));
    }

    public function removeDiscount()
    {
        if(!is_numeric($this->discount)) return false;
        $this->discount = max(0, min($this->discount, 100));
        Products::where('parent', $this->alias)->where('discount', '=', $this->discount)->update(['discount' => 0]);
        return redirect(request()->header('Referer'));
    }


    public function render()
    {
        return view('livewire.show-admin-apply-category-discount');
    }
}
