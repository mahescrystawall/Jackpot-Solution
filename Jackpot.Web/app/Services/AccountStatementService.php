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
                        'perPage'=> $perPage,
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
        // Get the base URL from the environment or configuration
        $this->baseUrl = env('API_URL');
    
        try {
            // Build the API endpoint with query parameters
            $url = $this->baseUrl . '/api/bet_list';
            $response = Http::timeout(60)->post($url, ['casino_bet_id' => $id]);
    
            // Check if the response was successful
            if ($response->successful()) {
                $data = $response->json();
                return [
                    'data' => $data,
                ];
            }
    
            // Return error message if the response failed
            return [
                'error' => 'Failed to fetch data',
                'status_code' => $response->status(),
            ];
        } catch (\Exception $e) {
            // Handle exceptions such as timeouts or network issues
            return ['error' => 'An error occurred: ' . $e->getMessage()];
        }
    }
    
    public function getOrderDetails(array $filters): array
    {
        $baseUrl = env('API_URL', '');
        if (empty($baseUrl)) {
            return ['error' => 'Base URL is not configured.'];
        }
    
        $url = rtrim($baseUrl, '/') . '/api/order_history';
    
        try {
            $response = Http::timeout(60)->post($url, [
                'event_type_id' => $filters[0]['event_type_id'] ?? null,
                'market_id' => $filters[0]['market_id'] ?? null,
            ]);
            if ($response->successful()) {
                return ['data' => $response->json()];
            }
    
            return [
                'error' => $response->json('message', 'Failed to fetch data.'),
                'status_code' => $response->status(),
            ];
        } catch (\Exception $e) {
            return ['error' => 'An error occurred: ' . $e->getMessage()];
        }
    }

}


