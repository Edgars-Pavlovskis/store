<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class OrdersController extends Controller
{


    public function index(Request $request)
    {
        $filter = $request->input('filter')??-1;
        $orders = $filter>=0 ? Orders::whereStatus($filter)->orderBy('id', 'DESC')->get() : Orders::orderBy('id', 'DESC')->get();

        $allOrders = Orders::select('status')->get();
        $ordersByStatus = [];
        foreach($allOrders as $order){
            if(!isset($ordersByStatus[$order->status])) $ordersByStatus[$order->status] = 0;
            $ordersByStatus[$order->status]++;
        }

        return view('orders.show',[
            'orders' => $orders,
            'ordersByStatus' => $ordersByStatus,
            'filter' => $filter,
            'totalOrders' => count($allOrders),
        ]);
    }




}
