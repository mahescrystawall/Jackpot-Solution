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
        // Get the data from the API or database
        $response = Http::timeout(60)->get($this->baseUrl . '/api/report/account-statement', $filters);
    
        if ($response->successful()) {
            $data = $response->json();    
            // Assuming 'data' contains the actual records
            $totalItems = isset($data['pagination']['total_items']) ? $data['pagination']['total_items'] : 0;
            $perPage = 10;
            $totalPages = ceil($totalItems / $perPage); // Calculate total pages
            $currentPage = (int) request()->get('page', 1); // Get the current page, default is 1
            $offset = ($currentPage - 1) * $perPage; // Calculate the offset for pagination
    
            // Paginate the data manually
            $pagedData = array_slice($data['data'], $offset, $perPage); // Paginate the actual data
    
            // Returning paginated data with pagination info
            return [
                'data' => $pagedData,
                'total_items' => $totalItems,
                'total_pages' => $totalPages,
                'current_page' => $currentPage,
                'prev_page' => ($currentPage > 1) ? $currentPage - 1 : null,
                'next_page' => ($currentPage < $totalPages) ? $currentPage + 1 : null,
            ];
        }
    
        return ['error' => 'Failed to fetch data'];
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


