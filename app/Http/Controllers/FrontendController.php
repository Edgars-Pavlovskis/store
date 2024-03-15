<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Products;

use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index()
    {
        return view('frontend.index',[
            'categories' => Categories::whereFeatured(1)->select('id','title','alias','image')->orderBy('priority')->get(),
        ]);
    }


    public function catalog($alias='')
    {
        return view('frontend.catalog',[
            'category' => Categories::whereAlias($alias)->select('id','title','alias','image','parent_alias')->first(),
            'products' => ($alias != '') ? Products::whereParent($alias)->whereActive(1)->select('id','title','image','price','parent')->get() : [],
        ]);
    }


}
