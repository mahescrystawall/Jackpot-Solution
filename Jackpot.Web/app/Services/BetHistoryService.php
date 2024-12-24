<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BetHistoryService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_URL');
    }

    public function getbetHistoryData($params)
    {

        $url = $this->baseUrl . '/api/bet_history';


        // if ($eventTypeId) {
        //     $queryParams['event_type_id'] = $eventTypeId;
        // }
        // if ($startDate) {
        //     $queryParams['start_date'] = $startDate;
        // }
        // if ($endDate) {
        //     $queryParams['end_date'] = $endDate;
        // }
        // if ($isMatched !== null) {
        //     $queryParams['is_matched'] = $isMatched;
        // }
        // $queryParams['event_type_id'] = 4;
        // $queryParams['is_matched'] = 1;
        // $queryParams['start_date'] = "2024-01-01";
        // $queryParams['end_date']  = "2024-12-11";

        //dd($params);
        $response = Http::timeout(60)->post($url, $params);
        //  dd($response);
        if ($response->successful()) {
           // dd($response->json());
            return $response->json();
        }
        return ['error' => 'Failed to fetch data'];
    }

    public function getAllSports()
    {


        $response = Http::timeout(60)->get($this->baseUrl . '/api/menu');
        if ($response->successful()) {
            return $response->json();
        }
        return ['error' => 'Failed to fetch data'];
    }
}
