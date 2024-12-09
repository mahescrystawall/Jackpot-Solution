<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StakeService
{
    public function getStakesData()
    {
        try {

            $baseUrl = config('app.api_url', env('API_URL'));

            $response = Http::timeout(60)->get($baseUrl.'/api/stakes');


            if ($response->successful()) {
                return $response->json();
            }

            return [];
        } catch (\Exception $e) {
            Log::error('Error fetching stakes data: ' . $e->getMessage());
            return [];
        }
    }

    public function updateStakeData($stakeData)
    {
        try {
            $response = Http::post('https://api.d99hub.com/api/client/update_stakes', $stakeData);

            if ($response->successful()) {
                return ['success' => true, 'message' => 'Stakes updated successfully'];
            }

            return ['success' => false, 'message' => 'Failed to update stakes'];
        } catch (\Exception $e) {
            Log::error('Error updating stake data: ' . $e->getMessage());
            return ['success' => false, 'message' => 'An error occurred while updating stake data.'];
        }
    }
}
