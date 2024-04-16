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


    public function cart()
    {


        return view('frontend.cart',[

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
        $product = Products::whereCode($alias)->select('id','gallery')->first();
        $galleryImages = File::glob(public_path('storage/products-gallery/'.((isset($product->gallery) && strlen($product->gallery)>0)?$product->gallery:$product->id).'/*'));
        foreach ($galleryImages as $key=>$path) {
            $path = str_replace(public_path(), '', $path);
            $galleryImages[$key] = str_replace("\\", '/', $path);
        }

        $attributes = ProductsAttribute::where('products_id',$product->id)->select('products_attributes.*', 'attributes.*')->join('attributes', 'products_attributes.attributes_id', '=', 'attributes.id')->get();
        foreach ($attributes as &$attribute) {
            $attribute->options = json_decode($attribute->options, true); // Decode from JSON and cast to array
        }

        return view('frontend.product',[
            'product' => Products::whereCode($alias)->first(),
            'galleryImages' => $galleryImages,
            'minPrice' => ProductsVariation::where('products_id',$product->id)->min('price') ?? 0,
            'maxPrice' => ProductsVariation::where('products_id',$product->id)->max('price') ?? 0,
            'attributes' => $attributes,
        ]);
    }

}
