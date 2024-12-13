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
   
      
    public function getAccountStatement($filters)
    {
        // Get the base URL from the configuration or environment
        $this->baseUrl = env('API_URL');
        
        try {
            // Send the request to the API with a timeout of 60 seconds
            $response = Http::timeout(60)->get($this->baseUrl .'/api/report/account-statement', $filters);
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


