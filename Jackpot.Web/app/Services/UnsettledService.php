<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UnsettledService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_URL');
    }

    public function getUnsettledBetData($isMatched = null)
    {

        $url = $this->baseUrl . '/api/unsettled_bets';



        if ($isMatched !== null) {
            $queryParams['is_matched'] = $isMatched;
        }


        $response = Http::timeout(60)->get($url, $queryParams);
        if ($response->successful()) {
            return $response->json();
        }
        return ['error' => 'Failed to fetch data'];
    }

    public function getbetHistoryData($isMatched = null)
    {

        $url = $this->baseUrl . '/api/unsettled_bets';

        if ($isMatched !== null) {
            $queryParams['is_matched'] = $isMatched;
        }

        $response = Http::timeout(60)->get($url, $queryParams);

        if ($response->successful()) {
            return $response->json();
        }
        return ['error' => 'Failed to fetch data'];
    }

}
