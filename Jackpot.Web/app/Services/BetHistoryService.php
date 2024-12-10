<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class BetHistoryService
{
    public function getbetHistoryData($sportId = null)
    {
        $baseUrl = env('API_URL');
        $url = $baseUrl . '/api/bet_history';

        if ($sportId) {
            $url .= '?event_type_id=' . $sportId;
        }

        $response = Http::timeout(60)->get($url);

        if ($response->successful()) {
            return $response->json(); // Return response as an array
        }

        return ['error' => 'Failed to fetch data'];
    }
    public function getAllSports()
    {

        $baseUrl = env('API_URL');

        $response = Http::timeout(60)->get($baseUrl.'/api/menu');

         // Check if the response is successful
         if ($response->successful()) {
            return $response->json(); // Return response as an array
        }
        return ['error' => 'Failed to fetch data'];
    }
}
?>
