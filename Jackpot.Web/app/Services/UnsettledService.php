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

    // public function getbetHistoryData($isMatched = null)
    // {

    //     $url = $this->baseUrl . '/api/unsettled_bets';

    //     if ($isMatched !== null) {
    //         $queryParams['is_matched'] = $isMatched;
    //     }

    //     $response = Http::timeout(60)->get($url, $queryParams);

    //     if ($response->successful()) {
    //         return $response->json();
    //     }
    //     return ['error' => 'Failed to fetch data'];
    // }

    public function getBetHistoryData()
    {
        // dd(session('auth_token'));
        // The endpoint URL
        $url = $this->baseUrl . '/api/getUnsettledBet';


        $response = Http::withToken(session('auth_token'))
            ->post($url, [
                'user_id'        => session('user_id'),
                'PageNumber'     => 1,
                'PageSize'       => 10,
                'OrderBy'        => 'created_on',
                'OrderDirection' => 'ASC',
            ]);
        // return $response;


        // Check if the response is successful
        if ($response->successful()) {
            return $response->json(); // Return the response as an array
        }

        // Handle error cases
        return ['error' => 'Failed to fetch data', 'status' => $response->status()];
    }
}
