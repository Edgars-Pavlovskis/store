<?php

namespace App\Livewire;

use DateTime;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Discount;
use App\Models\Categories;
use Illuminate\Http\Request;

class ShowDiscountConstructor extends Component
{
    public $type;
    public $title;
    public $id;

    public $active;
    public $datestart;
    public $dateend;

    public $data = [];

    public $categories = [];


    public function mount()
    {
        if(isset($this->id) && $this->id > 0)
        {
            $discount = Discount::whereId($this->id)->first();
            if($discount->id) {
                $this->type = $discount->type;
                $this->title = $discount->title;
                $this->active = $discount->active;
                $this->datestart = $discount->date_start;
                $this->dateend = $discount->date_end;
                $this->data = $discount->params;
            }
        }

        $prepareCategoriesList = false;
        foreach(config('shop.discounts.templates.'.$this->type.'.params') as $name => $param) {
            if(!isset($this->data[$name])) {
                if(isset($param['array']) && $param['array']) {
                    $this->data[$name] = [];
                } else {
                    $this->data[$name] = '';
                }
            }
            if($param['type'] == "category") $prepareCategoriesList = true;
        }
        if($prepareCategoriesList) {
            $this->categories = Categories::select('id','alias','title')->get();
        }

    }



    public function saveDiscount()
    {
        $request = [];

        foreach ($this->data as $key => $value) {
            $request[$key] = $value;
        }

        if(isset($this->id) && is_numeric($this->id) && $this->id>0)
        {
            $discount = Discount::whereId($this->id)->first();
            if($discount->id) {
                $discount->title = $this->title;
                $discount->date_start = $this->datestart ? DateTime::createFromFormat('d-m-Y', $this->datestart)->format('Y-m-d') : null;
                $discount->date_end = $this->dateend ? DateTime::createFromFormat('d-m-Y', $this->dateend)->format('Y-m-d') : null;
                $discount->active = $this->active??false;
                $discount->params = $request;
                $discount->save();
            }
        } else {
            $discount = Discount::create([
                'type' => $this->type,
                'title' => $this->title,
                'date_start' => $this->datestart ? DateTime::createFromFormat('d-m-Y', $this->datestart)->format('Y-m-d') : null,
                'date_end' => $this->dateend ? DateTime::createFromFormat('d-m-Y', $this->dateend)->format('Y-m-d') : null,
                'active' => $this->active??false,
                'params' => $request,
            ]);
        }

        return redirect()->route('discounts-show');
    }


    public function render()
    {
        return view('livewire.show-discount-constructor');
    }
}
