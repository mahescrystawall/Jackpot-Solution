<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;



class AccountStatementService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_URL');
    }
   
      
    public function getPaginatedAccountStatement($filters)
{
    try {
        // Fetch data from the API
        $response = Http::timeout(60)->post($this->baseUrl . '/api/report/account-statement', $filters);

        if ($response->successful()) {
            $data = $response->json();

            // Validate response structure
            if (isset($data['data'])) {
                $filteredData = $data['data']; // Assuming this is already filtered by the API
                $totalItems = count($filteredData); // Count filtered data
                $perPage = 10;
                $totalPages = ceil($totalItems / $perPage);
                $currentPage = (int) request()->get('page', 1);
                $offset = ($currentPage - 1) * $perPage;

                // Slice data for the current page
                $pagedData = array_slice($filteredData, $offset, $perPage);

                return [
                    'data' => $pagedData,
                    'total_items' => $totalItems,
                    'total_pages' => $totalPages,
                    'current_page' => $currentPage,
                    'prev_page' => ($currentPage > 1) ? $currentPage - 1 : null,
                    'next_page' => ($currentPage < $totalPages) ? $currentPage + 1 : null,
                ];
            }

            return ['error' => 'Invalid data structure received'];
        }

        return ['error' => 'Failed to fetch data from API'];
    } catch (\Exception $e) {
        return ['error' => 'An error occurred: ' . $e->getMessage()];
    }
}

       
    public function getBetList($id)
    {
        // Get the base URL from the configuration or environment
        $this->baseUrl = env('API_URL');
        
        try {
            // Send the request to the API with a timeout of 60 seconds
            $response = Http::timeout(60)->get(  $this->baseUrl.'/api/bet_list', $id);
            // Send filters if needed
            
            // Check if the response was successful
            if ($response->successful()) {
                return ['data' => $response->json()];  // Return the data in a structured format
            }
    
            // If the response failed, return the error and status code
            return ['error' => 'Failed to fetch data', 'status_code' => $response->status()];
        } catch (\Exception $e) {
            // Catch any exceptions, such as network issues, and return the error message
            return ['error' => 'An error occurred: ' . $e->getMessage()];
        }
    }
    

}


