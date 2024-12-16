<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProfitLossService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_URL');
    }   
   
      
    public function getPfList($filters)
    {
        $this->baseUrl = env('API_URL'); 
    
        try {
            // Send the request to the API with a timeout of 60 seconds
            $response = Http::timeout(60)->get($this->baseUrl . '/api/report/profit-loss', $filters);
    
            // Log the full response for debugging
            Log::debug('API Response: ', $response->json());
    
            // Check if the response was successful
            if ($response->successful()) {
                $data = $response->json();
    
                // Ensure the data exists and is correctly parsed
                if (isset($data['data']) && is_array($data['data'])) {
                    $profitLoss = $data['data'];
    
                    // Handle pagination data
                    $totalItems = count($profitLoss);
                   $perPage = 10;
                    $currentPage = (int) request()->get('page', 1);
                    $totalPages = ceil($totalItems / $perPage);
                    $offset = ($currentPage - 1) * $perPage;
    
                    $currentPage = max(1, min($currentPage, $totalPages));
    
                    // Paginate the data
                    $pagedData = array_slice($profitLoss, $offset, $perPage);
    
                    return [
                        'data' => $pagedData,
                        'pagination' => [
                            'total_items' => $totalItems,
                            'per_page'=>$perPage,
                            'total_pages' => $totalPages,
                            'current_page' => $currentPage,
                            'prev_page' => ($currentPage > 1) ? $currentPage - 1 : null,
                            'next_page' => ($currentPage < $totalPages) ? $currentPage + 1 : null,
                        ]
                    ];
                } else {
                    Log::error('Profit Loss Data not found in the API response');
                }
            }
    
            // If the response failed, return the error and status code
            return ['error' => 'Failed to fetch data', 'status_code' => $response->status()];
        } catch (\Exception $e) {
            // Catch any exceptions, such as network issues, and return the error message
            return ['error' => 'An error occurred: ' . $e->getMessage()];
        }
    }
    
    
    
       

    

}


