<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class OrdersController extends Controller
{

    public $search = '';

    public function index(Request $request)
    {
        $query = Orders::orderBy('id', 'DESC');
        $filter = $request->input('filter')??-1;
        if($filter >= 0) {
            $query->whereStatus($filter);
        }
        $this->search = $request->input('search')??'';
        if(strlen(trim($this->search)) > 0) {
            $query->search(trim($this->search));
        }
        $orders = $query->paginate(config('shop.backend.orders-per-page'));

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
            'search' => $this->search,
        ]);
    }

    public function showOrder($key)
    {
        $order = Orders::where('key', $key)->first();
        //dd($order);
        return view('orders.order',[
            'order' => $order,
        ]);
    }




}
