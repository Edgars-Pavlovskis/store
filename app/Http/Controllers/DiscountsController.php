<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class DiscountsController extends Controller
{

    public function index(Request $request)
    {
        return view('admin.discounts.show',[
            'discounts' => Discount::orderBy('type', 'asc')->get()
        ]);
    }


    public function createType()
    {
        return view('admin.discounts.create-type',[
            'types' => config('shop.discounts.templates')
        ]);
    }

    public function submitType(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ],[
            'type.required' => __('validation.discounts.type')
        ]);

        return view('admin.discounts.create',[
            'type' => $request->type,
            'id' => 0,
        ]);
    }


    public function editDiscount($id)
    {
        $type = Discount::whereId($id)->value('type');
        return view('admin.discounts.create',[
            'type' => $type,
            'id' => $id,
        ]);
    }
}
