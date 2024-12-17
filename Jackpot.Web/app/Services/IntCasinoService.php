<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IntCasinoService
{
    public function getCasinoData()
    {
        try {
            $baseUrl = 'http://127.0.0.1:8081/api/int-casino';

            // Make the API call
            $response = Http::timeout(60)->get($baseUrl);

            if ($response->successful()) {
                return $response->json();
            }

            return [];
        } catch (\Exception $e) {
            Log::error('Error fetching IntCasino data: ' . $e->getMessage());
            return [];
        }
    }

    public function getCasinoList($gameData){
        try {
            $baseUrl = 'http://127.0.0.1:8081/api/int-casino';

            // Make the API call
            $response = Http::timeout(60)->get($baseUrl);

            if ($response->successful()) {
                return $response->json();
            }

            return [];
        } catch (\Exception $e) {
            Log::error('Error fetching IntCasino data: ' . $e->getMessage());
            return [];
        }
    }
}
