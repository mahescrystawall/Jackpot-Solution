<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ClientService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_URL');
    }

    public function create_client($params){

        $url = $this->baseUrl.'api/create-client-user';

        $response = Http::timeout(60)->post($url, $params);
        //  dd($response);
        if ($response->successful()) {
           // dd($response->json());
            return $response->json();
        }
        return ['error' => 'Failed to fetch data'];
    }
}