<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BetHistoryService
{
    public function getbetHistoryData($eventTypeId = null, $startDate = null, $endDate = null, $isMatched = null)
    {
        $baseUrl = env('API_URL');
        $url = $baseUrl . '/api/bet_history';


        if ($eventTypeId) {
            $queryParams['event_type_id'] = $eventTypeId;
        }
        if ($startDate) {
            $queryParams['start_date'] = $startDate;
        }
        if ($endDate) {
            $queryParams['end_date'] = $endDate;
        }
        if ($isMatched !== null) {
            $queryParams['is_matched'] = $isMatched;
        }
        // $queryParams['event_type_id'] = 4;
        // $queryParams['is_matched'] = 1;
        // $queryParams['start_date'] = "2024-01-01";
        // $queryParams['end_date']  = "2024-12-11";

        $response = Http::timeout(60)->get($url, $queryParams);
        if ($response->successful()) {
            return $response->json();
        }
        return ['error' => 'Failed to fetch data'];
    }

    public function getAllSports()
    {

        $baseUrl = env('API_URL');
        $response = Http::timeout(60)->get($baseUrl . '/api/menu');
        if ($response->successful()) {
            return $response->json();
        }
        return ['error' => 'Failed to fetch data'];
    }
}
