<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class BetHistoryService
{
    public function getbetHistoryData()
    {
    
        $baseUrl = config('app.api_url', env('API_URL'));
        
        $response = Http::timeout(60)->get($baseUrl.'/api/bet_history');
         // Check if the response is successful
         if ($response->successful()) {
            return $response->json(); // Return response as an array
        }
        return ['error' => 'Failed to fetch data'];
    }
}
?>