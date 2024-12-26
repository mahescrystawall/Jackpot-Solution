<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProfitLossService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_URL');
    }

    public function getProfitLossData(string $apiUrl = null, array $filters = null)
    {
        $url = $this->baseUrl . '/api/profit-loss';

        try {
            // Send the request to the API with a timeout of 60 seconds
            $response = Http::timeout(60)->post($url, $filters);
            // Check if the response was successful
            if ($response->successful()) {
                $data = $response->json();
                return $data;
            }
            return ['error' => 'Failed to fetch data', 'status_code' => $response->status()];
        } catch (\Exception $e) {
            return ['error' => 'An error occurred: ' . $e->getMessage()];
        }
    }
}
