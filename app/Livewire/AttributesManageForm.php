<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Attributes;
use App\Models\AttributesTranslation;

class AttributesManageForm extends Component
{

    public $id;
    public $attribute;
    public $name=[];
    public $options=[];

    public function mount($id)
    {
        if($id) {
            $attribute = Attributes::find($id);
            $this->name = [];
            $this->name[getDefaultLocale()] = Attributes::whereId($id)->value('name');
            $this->options = [];
            $this->options[getDefaultLocale()] = Attributes::whereId($id)->value('options');
            foreach(AttributesTranslation::where('attributes_id', $id)->get() as $data) {
                $this->name[$data->locale] = $data->name ?? [];
                $this->options[$data->locale] = $data->options ?? [];
            }
            $this->attribute = $attribute;
        } else {
            $this->attribute = Attributes::make(['type' => 'value']);
        }
    }

    public function addOption()
    {
        $newkey = 'k'.Str::random(2).time();
        foreach(getLocales() as $locale)
        {
            $this->options[$locale][$newkey] = "";
        }
    }

    public function deleteOption($key)
    {
        foreach(getLocales() as $locale)
        {
            unset($this->options[$locale][$key]);
        }

    }

    public function render()
    {
        return view('livewire.attributes-manage-form');
    }
}
