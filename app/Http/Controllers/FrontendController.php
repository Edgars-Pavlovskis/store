<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Products;
use App\Models\ProductsAttribute;
use App\Models\ProductsVariation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'category' => Categories::whereAlias($alias)->select('id','title','alias','image','parent_alias')->first()
        ]);
    }


    public function product($alias='')
    {
        $productID = Products::whereCode($alias)->value('id');
        $galleryImages = File::glob(public_path('storage/products-gallery/'.$productID).'/*');
        foreach ($galleryImages as $key=>$path) {
            $path = str_replace(public_path(), '', $path);
            $galleryImages[$key] = str_replace("\\", '/', $path);
        }

        $attributes = ProductsAttribute::where('products_id',$productID)->select('products_attributes.*', 'attributes.*')->join('attributes', 'products_attributes.attributes_id', '=', 'attributes.id')->get();
        foreach ($attributes as &$attribute) {
            $attribute->options = json_decode($attribute->options, true); // Decode from JSON and cast to array
        }

        return view('frontend.product',[
            'product' => Products::whereCode($alias)->first(),
            'galleryImages' => $galleryImages,
            'minPrice' => ProductsVariation::where('products_id',$productID)->min('price') ?? 0,
            'maxPrice' => ProductsVariation::where('products_id',$productID)->max('price') ?? 0,
            'attributes' => $attributes,
        ]);
    }

}
