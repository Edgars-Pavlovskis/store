<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Rules\Categoryunique;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CategoriesController extends Controller
{

    public function index($alias='root')
    {
        $current = Categories::whereAlias($alias)->first();
        return view('admin.categories.show',[
            'categories' => Categories::where('parent_alias', $alias)->get(),
            'current' => $current
        ]);

    }


    public function create($alias='root')
    {
        return view('admin.categories.create', [
            'category_parent_alias' => $alias
        ]);
    }


    public function store(Request $req, $alias)
    {
        $req->validate([
            'alias' => ['required', 'max:255', new Categoryunique],
            'image' => 'mimes:jpg,jpeg,webp|max:400',
        ]);

        $input = $req->all();
        if(!$req->featured) $input['featured']= 0;
        if($req->image) {
            $fileName = time().'_'.$req->image->getClientOriginalName();
            $filePath = $req->image->storeAs('categories', $fileName, 'public');
            $input['image'] = $fileName;
        }
        $input['alias'] = convertToLatin($input['alias']);
        $input['parent_alias'] = $alias;


        $category = Categories::create($input);
        return redirect('/admin/categories/show/'.$alias);

    }


    public function edit($alias='root')
    {
        return view('admin.categories.edit',[
            'category' => Categories::whereAlias($alias)->first()
        ]);
    }


    public function update(Request $req, $alias)
    {
        $req->validate([
            'alias' => ['required', 'max:255'],
            'image' => 'mimes:jpg,jpeg,webp|max:400',
        ]);

        $input = $req->all();
        if(!$req->featured) $input['featured']= 0;
        if($req->image) {
            $fileName = time().'_'.$req->image->getClientOriginalName();
            $filePath = $req->image->storeAs('categories', $fileName, 'public');
            $input['image'] = $fileName;
        }
        $input['alias'] = convertToLatin($input['alias']);



        if($input['alias'] != $alias) { //if alias was edited..
            if(Categories::whereAlias($input['alias'])->count() > 0) {
                throw ValidationException::withMessages(['alias' => __('URL alias already exists')]);
            } else {
                Categories::where('parent_alias', $alias)->update(['parent_alias' => $input['alias']]);
            }
        }

        $category = Categories::whereAlias($alias)->first();
        $category->update($input);
        return redirect('/admin/categories/show/'.$input['alias']);

    }


}
