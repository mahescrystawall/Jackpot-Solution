<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

            //dd($response->json());
            // Log the full response for debugging
            // Log::debug('API Response: ', $response->json());

            // Check if the response was successful
            if ($response->successful()) {
                $data = $response->json();
                return $data;
                // dd($data);
                // $events = $profitLossData['data']['profit_loss'];
                // Ensure the data exists and is correctly parsed
                // if (isset($data['data']['profit_loss']) && is_array($data['data']['profit_loss'])) {
                //     $profitLoss = $data['data']['profit_loss'];



                // } else {
                //     Log::error('Profit Loss Data not found in the API response');
                // }
            }

            // If the response failed, return the error and status code
            return ['error' => 'Failed to fetch data', 'status_code' => $response->status()];
        } catch (\Exception $e) {
            // Catch any exceptions, such as network issues, and return the error message
            return ['error' => 'An error occurred: ' . $e->getMessage()];
        }
    }
}
