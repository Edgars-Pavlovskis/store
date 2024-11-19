<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Attributes;
use App\Models\CategoriesTranslation;
use App\Models\ProductsTranslation;
use App\Models\AttributesTranslation;
use App\Rules\Categoryunique;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\URL;

class CategoriesController extends Controller
{

    public function index($alias='root', $showinnactive = '')
    {
        if($alias == "root") $alias = null;
        //dd(getLocalesWithoutDefault());
        //dd(defaultLocaleActive());
        $current = Categories::whereAlias($alias)->first();


        $productsQuery = Products::where('parent', $alias);
        if($showinnactive == "show-innactive") $productsQuery->where('active', 0);
        return view('admin.categories.show',[
            'categories' => Categories::where('parent_alias', $alias)->orderBy('priority')->get(),
            'products' => $productsQuery->orderBy('id', 'DESC')->get(),
            'current' => $current,
            'showinnactive' => $showinnactive
        ]);
    }



    public function showinnactive()
    {
        return view('admin.categories.show',[
            'categories' => [],
            'products' => Products::where('active', 0)->orderBy('id', 'DESC')->get(),
            'current' => null,
            'showinnactive' => true
        ]);
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        if(strlen($search)>0) {
            $products = Products::search($search)->get();
        } else {
            $products = [];
        }

        return view('admin.categories.search',[
            'products' => $products,
            'search' => $search
        ]);


    }



    public function updateSorting(Request $request)
    {
        $newOrder = $request->input('order');
        foreach ($newOrder as $item) {
            // Update the order attribute in the database
            Categories::where('id', $item['id'])->update(['priority' => $item['order']]);
        }
        return response()->json(['success' => true]);
    }


    public function updateAttributesSorting(Request $request)
    {
        $newOrder = $request->input('order');
        foreach ($newOrder as $item) {
            // Update the order attribute in the database
            Attributes::where('id', $item['id'])->update(['priority' => $item['order']]);
        }
        return response()->json(['success' => true]);
    }



    public function create($alias='root')
    {
        return view('admin.categories.create', [
            'category_parent_alias' => $alias
        ]);
    }




    public function edit($alias='root')
    {
        $category = Categories::whereAlias($alias)->first();
        $translationData = CategoriesTranslation::where('categories_id', $category->id)->get();
        $translated = [];
        foreach($translationData as $data) {
            $translated[$data->locale]['title'] = $data['title'];
            $translated[$data->locale]['description'] = $data['description'];
        }

        $title = [];
        $description = [];
        $title[getDefaultLocale()] = $category->title;
        $description[getDefaultLocale()] = $category->description;
        foreach(getLocalesWithoutDefault() as $locale)
        {
            $title[$locale] = (isset($translated[$locale]['title'])) ? $translated[$locale]['title'] : '';
            $description[$locale] = (isset($translated[$locale]['description'])) ? $translated[$locale]['description'] : '';
        }
        $category->title = $title;
        $category->description = $description;

        return view('admin.categories.edit',[
            'category' => $category
        ]);
    }


    public function attributes($alias='root')
    {
        if($alias == "root") $alias = null;
        $current = Categories::whereAlias($alias)->first();
        return view('admin.categories.attributes',[
            'attributes' => Attributes::where('group', $alias)->orderBy('priority')->get(),
            'current' => $current
        ]);
    }


    public function manageAttribute($alias='root', $id = false)
    {
        return view('admin.categories.attributes.manage',[
            'category_parent_alias' => $alias,
            'id' => $id
        ]);
    }


    public function storeAttribute(Request $req, $id=false)
    {
        $input = $req->all();
        //dd($input);
        $input['group'] = ($input['alias'] == "root") ? null : $input['alias'];
        unset($input['alias']);

        $namesArray = $input['name'] ?? [];
        $input['name'] = $namesArray[getDefaultLocale()] ?? '';
        unset($namesArray[getDefaultLocale()]);

        $optionsArray = $input['options'] ?? [];

        $input['options'] = $optionsArray[getDefaultLocale()] ?? [];
        unset($optionsArray[getDefaultLocale()]);

        $attribute = Attributes::updateOrCreate(
            ['id' => $id],
            $input
        );
        foreach(getLocalesWithoutDefault() as $locale)
        {
            if($id == 0) $id = $attribute->id;
            $at = AttributesTranslation::updateOrCreate(
                ['attributes_id' => $id, 'locale' => $locale],
                [
                    'attributes_id' => $id,
                    'locale' => $locale,
                    'name' => isset($namesArray[$locale]) ? $namesArray[$locale] : '',
                    'options' => isset($optionsArray[$locale]) ? $optionsArray[$locale] : [],
                ]
            );
        }

        return redirect('/admin/categories/attributes/'.$input['group']);
    }




    public function store(Request $req, $alias, $parent=false)
    { //btw: $parent is true when creating new category. false on editing existing.
        $req->validate([
            'alias' => $parent ? ['required', 'max:255', new Categoryunique] : ['required', 'max:255'],
            'image' => 'mimes:png,jpg,jpeg,webp|max:400',
        ]);

        $input = $req->all();

        if(!$req->featured) $input['featured']= 0;
        if($req->image) {
            $fileName = time().'_'.$req->image->getClientOriginalName();
            $filePath = $req->image->storeAs('categories', $fileName, 'public');
            $input['image'] = $fileName;
        }
        $input['alias'] = convertToLatin($input['alias']);
        if($parent) {
            $input['parent_alias'] = ($parent == "root") ? null : $parent;
            $alias = $input['alias'];
        } else {
            if($input['alias'] != $alias) { //if alias was edited..
                if(Categories::whereAlias($input['alias'])->count() > 0) {
                    throw ValidationException::withMessages(['alias' => __('URL alias already exists')]);
                } else {
                    $parents = Categories::select('id','alias','parent_alias')->where('parent_alias', $alias)->get();
                    foreach ($parents as $record) {
                        $record->parent_alias = null;
                    }
                    $parents->each->save();
                    Categories::where('alias', $alias)->update(['alias' => $input['alias']]);
                    foreach ($parents as $record) {
                        $record->parent_alias = $input['alias'];
                    }
                    $parents->each->save();
                    //Products::whereParent($alias)->update(['parent' => $input['alias']]);
                }
            }
        }


        $titlesArray = $input['title'];
        $descriptionsArray = $input['description'];
        $input['title'] = $titlesArray[getDefaultLocale()];
        $input['description'] = $descriptionsArray[getDefaultLocale()];
        unset($titlesArray[getDefaultLocale()]);
        unset($descriptionsArray[getDefaultLocale()]);
        if(isset($input['parent'])) unset($input['parent']);



        $category = Categories::updateOrCreate(
            ['alias' => $input['alias']],
            $input
        );

        foreach(getLocalesWithoutDefault() as $locale)
        {
            if(!isset($titlesArray[$locale]) && !isset($descriptionsArray[$locale])) continue;
            $ct = CategoriesTranslation::updateOrCreate(
                ['categories_id' => $category->id, 'locale' => $locale],
                [
                    'categories_id' => $category->id,
                    'locale' => $locale,
                    'title' => isset($titlesArray[$locale]) ? $titlesArray[$locale] : '',
                    'description' => isset($descriptionsArray[$locale]) ? $descriptionsArray[$locale] : '',
                ]
            );
        }

        return redirect('/admin/categories/show/'.($parent ? $parent : $input['alias']));
    }



}
