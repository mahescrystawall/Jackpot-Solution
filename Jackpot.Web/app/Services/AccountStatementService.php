<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;



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
            // Send a POST request to the backend API with filters
            $response = Http::timeout(60)->post($this->baseUrl . '/api/report/account-statement', $filters);
            Log::info('API Response', ['response' => $response->json()]);

    
            // Check if the response is successful
            if ($response->successful()) {
                $data = $response->json();
    
                // Validate the response structure
                if (isset($data['data']['transactions']) && is_array($data['data']['transactions'])) {
                    $transactions = $data['data']['transactions'];
                    $menu = $data['data']['menu'];
                    $totalItems = count($transactions);
                    $perPage = 10; // Items per page
                    $currentPage = (int) request()->get('page', 1);
                    $totalPages = ceil($totalItems / $perPage);
                    $offset = ($currentPage - 1) * $perPage;
    
                    // Ensure the current page is within bounds
                    $currentPage = max(1, min($currentPage, $totalPages));
    
                    // Paginate the data
                    $pagedData = array_slice($transactions, $offset, $perPage);
                    $menuData= $menu;
    
                    return [
                        'data' => $pagedData,
                        'menuData'=>$menuData,
                        'total_items' => $totalItems,
                        'total_pages' => $totalPages,
                        'current_page' => $currentPage,
                        'prev_page' => ($currentPage > 1) ? $currentPage - 1 : null,
                        'next_page' => ($currentPage < $totalPages) ? $currentPage + 1 : null,
                    ];
                }
    
                // If the expected structure is not present, return an error
                return ['error' => 'Invalid data structure received from API.'];
            }
    
            // Handle unsuccessful responses
            return ['error' => 'Failed to fetch data from API. HTTP Status: ' . $response->status()];
        } catch (\Exception $e) {
            // Catch and return unexpected errors
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


