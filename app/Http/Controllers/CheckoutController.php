<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkoutComplete()
    {
        return view('frontend.checkout-complete',[

        ]);
    }
}
