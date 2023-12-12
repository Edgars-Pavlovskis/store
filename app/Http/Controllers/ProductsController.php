<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller
{


    public function create($alias='')
    {
        if(!empty($alias)){
            return view('admin.products.create', [
                'alias' => $alias
            ]);
        }
    }



    public function store(Request $req, $alias)
    {

        dd($req->all());

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


}
