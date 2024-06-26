<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Models\Banner;

class ShowBannerConstructor extends Component
{
    use WithFileUploads;

    public $type;
    public $title;
    public $id;

    public $data = [];

    public $hasI18n;

    public $filenamesForRemoval = [];

    public function mount()
    {
        $this->hasI18n = false;

        if(isset($this->id) && $this->id > 0)
        {
            $banner = Banner::whereId($this->id)->first();
            if($banner->id) {
                $this->type = $banner->type;
                $this->title = $banner->title;
                $this->data = $banner->params;
            }
        }

        foreach(config('shop.banners.templates.'.$this->type.'.params') as $name => $param) {

            if($param['type'] == 'i18n') {
                if(!isset($this->data[$name])) {
                    $this->data[$name] = [];
                    foreach(config('shop.languages.list') as $lang) {
                        $this->data[$name][$lang] = '';
                    }
                }
                $this->hasI18n = true;
            } else {
                if(!isset($this->data[$name])) $this->data[$name] = '';
            }
        }

    }

    public function removeImage($name)
    {
        $this->filenamesForRemoval[] = $this->data[$name];
        $this->data[$name] = '';
    }


    public function saveBanner()
    {
        $request = [];

        //dd(get_class($this->data['image-main']));
        foreach ($this->data as $key => $value) {
            if ($value instanceof TemporaryUploadedFile) {
                $ext = $value->getClientOriginalExtension();
                $filename = now()->timestamp . '-' . Str::random(10) . '.' . $ext;
                $value->storeAs('public/images', $filename);
                $request[$key] = $filename;
            } else {
                $request[$key] = $value;
            }

        }

        if(isset($this->id) && is_numeric($this->id) && $this->id>0)
        {
            $banner = Banner::whereId($this->id)->first();
            if($banner->id) {
                $banner->title = $this->title;
                $banner->date_end = $request['date-end']??null;
                $banner->params = $request;
                $banner->save();
            }
        } else {
            $banner = Banner::create([
                'type' => $this->type,
                'title' => $this->title,
                'date_end' => $request['date-end']??null,
                'params' => $request,
            ]);
        }


        return redirect()->route('banners-show');
    }

    public function render()
    {
        return view('livewire.show-banner-constructor');
    }
}



