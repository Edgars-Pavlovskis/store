<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Attributes;
use App\Models\Products;
use App\Models\ProductsTranslation;
use App\Models\ProductsAttribute;
use App\Models\ProductsVariation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Rules\Productunique;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class ProductsController extends Controller
{

/*
$products = Product::select('products.id', 'products.name', 'translations.name AS translated_name')
    ->join('translations', 'products.id', '=', 'translations.product_id')
    ->when($locale === 'en', fn () => Product::select('products.id', 'products.name')->get())
    ->when($locale !== 'en', fn () => Product::select('products.id', 'translations.locale', 'translations.name')->where('translations.locale', $locale)->get())
    ->get();



    'uploadedFolderName' =>Str::random(20) . '-' . time()


*/

    public function copy($alias='')
    {
        if(!empty($alias)){
            $parent = Products::where('code', $alias)->first();
            if ($parent) {
                $newProduct = $parent->replicate();
                $newProduct->code = $parent->code . '-' . time();
                $newProduct->image = null;
                $newProduct->gallery = null;
                $newProduct->save();
                $attributes = ProductsAttribute::where('products_id',$parent->id)->get();
                foreach($attributes as $oldAttribute) {
                    $copiedAttribute = new ProductsAttribute();
                    $copiedAttribute->products_id = $newProduct->id;
                    $copiedAttribute->attributes_id = $oldAttribute->attributes_id;
                    $copiedAttribute->value = $oldAttribute->value;
                    $copiedAttribute->save();
                }
                return redirect('/admin/products/edit/'.$newProduct->code);
            }
        }
    }

    public function create($alias='')
    {
        if(!empty($alias)){
            return view('admin.products.create', [
                'alias' => $alias,
                'categoryTitle' => Categories::where('alias', $alias)->select('title')->first()
            ]);
        }
    }


    public function showGallery($alias='')
    {
        if(!empty($alias)){
            return view('admin.products.gallery', [
                'alias' => $alias,
                'product' => Products::where('code', $alias)->select('id', 'title')->first(),
            ]);
        }
    }


    public function showAttributes($alias='')
    {
        if(!empty($alias)){
            $product = Products::where('code', $alias)->select('id', 'title', 'parent')->first();
            if(isset($product->id)) {
                $attributes = Attributes::where('group', $product->parent)->get();
                $productsAttributes = ProductsAttribute::where('products_id', $product->id)->get();
                $pa = array();
                foreach($productsAttributes as $attribute) {
                    $pa[$attribute->attributes_id] = $attribute->value;
                }

                return view('admin.products.attributes', [
                    'alias' => $alias,
                    'product' => $product,
                    'attributes' => $attributes,
                    'products_attributes' => $pa
                ]);
            }
        }
    }


    public function showVariations($alias='')
    {
        if(!empty($alias)){
            $product = Products::where('code', $alias)->select('id', 'title', 'code', 'parent', 'variations')->first();
            if(isset($product->id)) {
                $productsVariations = ProductsVariation::where('products_id', $product->id)->get();
                $attributes = Attributes::where('group', $product->parent)->get();
                //dd($productsVariations);
                return view('admin.products.variations', [
                    'alias' => $alias,
                    'product' => $product,
                    'attributes' => $attributes,
                    'products_variations' => $productsVariations
                ]);
            }
        }
    }

    public function updateVariationsAttributes(Request $req, $productID)
    {
        $product = Products::whereId($productID)->select('id', 'code', 'variations')->first();
        $variationsAttributesIDs = $req['attributes'] ?? [];
        $product->variations = $variationsAttributesIDs;
        $product->save();

        //also need to go through this product active variations and remove variations array values that were removed from active list.
        $variationsData = ProductsVariation::where('products_id', $productID)->select('id', 'variations')->get();
        foreach($variationsData as $varkey => $variationData) {
            $variations = $variationData->variations;
            foreach($variations as $key => $value) {
                if(!in_array($key, $variationsAttributesIDs)) {
                    unset($variations[$key]);
                }
            }
            ProductsVariation::where('id', $variationData->id)->update(['variations'=>$variations]);
        }
        return redirect('/admin/products/variations/'.$product->code);
    }


    public function productGalleryUpload(Request $req)
    {
        $req->validate([
            'file' => 'mimes:jpg|max:5120'
        ]);
        if($req->file()) {
            $fileName = 'img_'.Str::random(5).time().'.'.$req->file->getClientOriginalExtension();
            $filePath = $req->file('file')->storeAs('products-gallery/'.$req->id, $fileName, 'public');
            return response($fileName, 200)->header('Content-Type', 'text/plain');
        }
    }


    public function edit($alias='')
    {
        $product = Products::whereCode($alias)->first();
        $translationData = ProductsTranslation::where('products_id', $product->id)->get();
        $translated = [];
        foreach($translationData as $data) {
            $translated[$data->locale]['title'] = $data['title'];
            $translated[$data->locale]['description'] = $data['description'];
            $translated[$data->locale]['details'] = $data['details'];
        }

        $title = [];
        $description = [];
        $details = [];
        $title[getDefaultLocale()] = $product->title;
        $description[getDefaultLocale()] = $product->description;
        $details[getDefaultLocale()] = $product->details;
        foreach(getLocalesWithoutDefault() as $locale)
        {
            $title[$locale] = (isset($translated[$locale]['title'])) ? $translated[$locale]['title'] : '';
            $description[$locale] = (isset($translated[$locale]['description'])) ? $translated[$locale]['description'] : '';
            $details[$locale] = (isset($translated[$locale]['details'])) ? $translated[$locale]['details'] : '';
        }
        $product->title = $title;
        $product->description = $description;
        $product->details = $details;

        return view('admin.products.edit',[
            'product' => $product,
            'path' =>(isset($product->gallery) && strlen($product->gallery) > 0) ? $product->gallery : Str::random(5) . '-' . time()
        ]);

    }



    public function store(Request $req, $alias)
    {
        $routeName = $req->route()->getName();

        //dd($req->all());

        $req->validate([
            'code' => ($routeName == "products-store") ? ['required', 'max:255', new Productunique] : ['required', 'max:255'],
            'image' => 'mimes:jpg,jpeg,webp|max:400',
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'stock' => ['required', 'integer'],
        ]);

        $input = $req->all();
        if(!$req->active) $input['active']= 0;
        if(!$req->new) $input['new']= 0;
        if(!$req->special) $input['special']= 0;
        if($req->image) {
            $fileName = time().'_'.$req->image->getClientOriginalName();
            $filePath = $req->image->storeAs('products', $fileName, 'public');
            $input['image'] = $fileName;
        }

        $input['code'] = convertToLatin($input['code']);
        $input['inner_code'] = trim($input['inner_code']);

        if($routeName == "products-update") {
            $currentCode = Products::where('code', $alias)->value('code');
            if($input['code'] != $currentCode) { //if alias was edited..
                //dd($input['code'].'---'.$currentCode);
                if(Products::whereCode($input['code'])->count() > 0) {
                    throw ValidationException::withMessages(['code' => __('Product code already exists')]);
                } else {
                    Products::where('code', $currentCode)->update(['code' => $input['code']]);
                }
            }
        } else {
            $input['parent'] = $alias;
        }

        $titlesArray = $input['title'];
        $descriptionsArray = $input['description'];
        $detailsArray = $input['details'];
        $input['title'] = $titlesArray[getDefaultLocale()];
        $input['description'] = $descriptionsArray[getDefaultLocale()];
        $input['details'] = $detailsArray[getDefaultLocale()];
        unset($titlesArray[getDefaultLocale()]);
        unset($descriptionsArray[getDefaultLocale()]);
        unset($detailsArray[getDefaultLocale()]);

        $product = Products::updateOrCreate(
            ['code' => $input['code']],
            $input
        );

        foreach(getLocalesWithoutDefault() as $locale)
        {
            if(!isset($titlesArray[$locale]) && !isset($descriptionsArray[$locale]) && !isset($detailsArray[$locale])) continue;
            $pt = ProductsTranslation::updateOrCreate(
                ['products_id' => $product->id, 'locale' => $locale],
                [
                    'products_id' => $product->id,
                    'locale' => $locale,
                    'title' => isset($titlesArray[$locale]) ? $titlesArray[$locale] : '',
                    'description' => isset($descriptionsArray[$locale]) ? $descriptionsArray[$locale] : '',
                    'details' => isset($detailsArray[$locale]) ? $detailsArray[$locale] : '',
                ]
            );
        }

        if($routeName == "products-store") {
            return redirect('/admin/categories/show/'.$alias);
        } else {
            return redirect('/admin/categories/show/'.$product->parent);
        }

    }




    public function updateAttributes(Request $req, $alias)
    {
        $productID = Products::where('code', $alias)->value('id');
        $productParent = Products::where('code', $alias)->value('parent');
        $input = $req->all();

        foreach($input['attributes'] as $key => $value) {
            if($value) {
                ProductsAttribute::updateOrCreate(
                    ['products_id' => $productID, 'attributes_id' => $key],
                    [
                        'products_id' => $productID,
                        'attributes_id' => $key,
                        'value' => $value,
                    ]
                );
            } else {
                ProductsAttribute::where('products_id',$productID)->where('attributes_id',$key)->delete();
            }
        }

        return redirect('/admin/categories/show/'.$productParent);
    }

}
