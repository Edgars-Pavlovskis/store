<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClientsController extends Controller
{
    public $search = '';

    public function index(Request $request)
    {
        $query = User::orderBy('id', 'DESC');
        $filter = $request->input('filter')??-1;
        if($filter >= 0) {
            $query->whereDiscount($filter);
        }
        $this->search = $request->input('search')??'';
        if(strlen(trim($this->search)) > 0) {
            $query->search(trim($this->search));
        }

        $clients = $query->paginate(20);

        $allClients = User::select('discount')->get();
        $clientsByDiscount = [];
        foreach($allClients as $client){
            if(!isset($clientsByDiscount[$client->discount])) $clientsByDiscount[$client->discount] = 0;
            $clientsByDiscount[$client->discount]++;
        }

        return view('clients.show',[
            'clients' => $clients,
            'clientsByDiscount' => $clientsByDiscount,
            'filter' => $filter,
            'totalClients' => count($allClients),
            'search' => $this->search,
        ]);
    }

    public function showClient($email)
    {
        $client = User::where('email', $email)->first();
        //dd($order);
        return view('clients.client',[
            'client' => $client,
        ]);
    }

}
