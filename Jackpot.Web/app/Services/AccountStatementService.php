<?php

namespace App\Services;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;



class AccountStatementService
{
   
    public function getAccountStatement(array $filters = [])
{
    // Get the base URL from the configuration or environment
    $baseUrl = config('app.api_url', env('API_URL'));
    
    // Fetch the account statement data from the API
    $loginData = Http::timeout(60)->get($baseUrl.'/api/report/account-statement');
    
    // Check if the request was successful
    if ($loginData->successful()) {
        $data = $loginData->json(); // Return response as an array
        
        // Extract filters from the provided array
        $startDate = isset($filters['start_date']) ? Carbon::parse($filters['start_date'])->toDateString() : null;
        $endDate = isset($filters['end_date']) ? Carbon::parse($filters['end_date'])->toDateString() : null;
        $category = isset($filters['category']) ? $filters['category'] : null;

        // Filter the data based on the filters provided
        $filteredData = collect($data)->filter(function ($item) use ($startDate, $endDate, $category) {
            $dateMatch = (!$startDate || $item['date'] >= $startDate) && (!$endDate || $item['date'] <= $endDate);
            $categoryMatch = !$category || $item['sports'] === $category;
            return $dateMatch && $categoryMatch;
        })->values()->toArray();

        return $filteredData;  // Return the filtered data
    }

    // If the API request fails, return an error message
    return ['error' => 'Failed to fetch data'];
}       
    }


