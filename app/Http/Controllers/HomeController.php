<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }



    public function dpdtest()
    {
        $accessToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjdXN0b21lcl9pZCI6ODM3NywiYWRtaW5faWQiOm51bGwsInNpZ25hdHVyZV9pZCI6IjI0ZGNlZDkyLWYzMzUtNGZlYS1iMGYxLTEyYzA0NzI4ZmVmNSIsInNpZ25hdHVyZV9uYW1lIjoiSW50ZXJuZXR2ZWlrYWxzIiwiaXNzIjoiYW1iZXItbHYiLCJleHAiOjEwMTcxNDM5NjE3M30.LC7FHSDDc5x7VfSyw-DPvy-CqHnUNvUbLvqyNzXRln4";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'accept' => 'application/json',
        ])
        ->get('https://eserviss.dpd.lv/api/v1/lockers', [
            'countryCode' => 'LV',
        ]);

        if ($response->ok()) {
            $rawData = $response->json();
            $lockersData = [];
            foreach($rawData as $item) {
                $lockersData[$item['id']] = $item['address']['city'].', '.$item['name'].' ('.$item['address']['street'].')';
            }

            usort($lockersData, function ($a, $b) {
                return strcmp($a, $b);
            });
            $jsonData = json_encode($lockersData, JSON_PRETTY_PRINT);
            $filePath = storage_path('app/public/dpd/lockers.json');

            if (!file_exists(dirname($filePath))) {
                mkdir(dirname($filePath), 0777, true);
            }

            // Saglabājam JSON datus failā
            file_put_contents($filePath, $jsonData);
            http_response_code(200);

        } else {
            // Apstrādājiet kļūdas gadījumus
            $error = $response->json();
            dd($error);
        }
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
}
