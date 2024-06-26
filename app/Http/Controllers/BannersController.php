<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannersController extends Controller
{


    public function index(Request $request)
    {
        return view('admin.banners.show',[
            'banners' => Banner::orderBy('type', 'asc')->get()
        ]);
    }




    public function createType()
    {
        return view('admin.banners.create-type',[
            'types' => config('shop.banners.templates')
        ]);
    }

    public function submitType(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ],[
            'type.required' => __('validation.banners.type')
        ]);

        return view('admin.banners.create',[
            'type' => $request->type,
            'id' => 0,
        ]);
    }


    public function editBanner($id)
    {
        $type = Banner::whereId($id)->value('type');
        return view('admin.banners.create',[
            'type' => $type,
            'id' => $id,
        ]);
    }


}
