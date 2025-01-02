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

    public function createClient(array $params)
    {

        $url = $this->baseUrl . '/api/create-client-user';

        $response = Http::timeout(60)->post($url, $params);
        if ($response->successful()) {
            return $response->json();
        }
        return ['error' => 'Failed to fetch data'];
    }

    public function getClientLists(array $adminID)
    {
        $parentId = $adminID;

        $url = $this->baseUrl . '/api/client-list';

        $response = Http::withToken(session('auth_token'))->timeout(60)->get($url, $parentId);
      //  dd($response->json());

        if ($response->successful()) {
            return $response->json();
        }

        return ['error' => 'Failed to fetch data'];
    }
}
