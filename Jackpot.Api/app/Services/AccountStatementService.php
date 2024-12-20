<?php

namespace App\Services;

use App\Traits\FileHelper;
use Illuminate\Support\Facades\File;
use App\Interfaces\IAccountStatementService;



class AccountStatementService implements IAccountStatementService
{
    use FileHelper;

    public function getAccountStatement(string $fileName, array $filters): array
    {
        // Define the path where the JSON file is stored
        $filePath = storage_path("json/{$fileName}");

        // Define the path for the menu.json file
        $menuFilePath = storage_path('json/menu.json');

        // Check if the file exists
        if (!File::exists($filePath)) {
            return ['error' => 'File not found'];
        }

        // Read the file contents
        $fileContents = File::get($filePath);

        // Decode the JSON into an array
        $data = json_decode($fileContents, true);

        // Load the menu.json file to get event_type_id names
        $filteredMenu = [];
        if (File::exists($menuFilePath)) {
            $menuContents = File::get($menuFilePath);
            $menuData = json_decode($menuContents, true);
            $eventTypeId = $filters['category'] ?? null;

            // Filter the menu if a specific category ID is provided
            if ($eventTypeId && $eventTypeId !== "ALL") {
                $filteredMenu = array_filter($menuData['data']['menu'], function ($item) use ($eventTypeId) {
                    return $item['id'] == $eventTypeId;
                });
            } else {
                $filteredMenu = $menuData['data']['menu']; // Use full menu if no category or "ALL" is provided
            }
        }

        // Initialize the transactions array from data
        $transactions = $data['data']['transactions']['data'];

        // Extract pagination details
        $pagination = $data['data']['transactions'];
        $paginationDetails = [
            'next_page_url' => $pagination['next_page_url'],
            'path' => $pagination['path'],
            'per_page' => $pagination['per_page'],
            'prev_page_url' => $pagination['prev_page_url'],
            'to' => $pagination['to'],
            'total' => $pagination['total'],
        ];

        // Apply category filter (event_type_id)
        if (isset($filters['category']) && $filters['category'] !== "ALL") {
            $transactions = array_filter($transactions, function ($item) use ($filters) {
                return isset($item['event_type_id']) &&
                    (int)$item['event_type_id'] === (int)$filters['category'];
            });
        }

        // Apply date filter if start_date and end_date are provided
        if (isset($filters['start_date']) && isset($filters['end_date'])) {
            $startDate = \Carbon\Carbon::parse($filters['start_date'])->startOfDay();
            $endDate = \Carbon\Carbon::parse($filters['end_date'])->endOfDay();

            $transactions = array_filter($transactions, function ($item) use ($startDate, $endDate) {
                $transactionDate = \Carbon\Carbon::parse($item['created_at']);
                return $transactionDate->between($startDate, $endDate);
            });
        }

        // Reset keys for filtered transactions
        $filteredTransactions = array_values($transactions);

        // Prepare the response data
        return [
            'status' => true,
            'message' => 'Filtered records found',
            'data' => [
                'transactions' => $filteredTransactions, // Reset keys for filtered transactions
                'menu' => array_values($filteredMenu), // Reset keys for the filtered menu
            ],
            'pagination' => $paginationDetails, // Include pagination details
        ];
    }




    public function getCasinoData(string $casinoBetId): array
    {
        // Path to the JSON file
        $filePath = storage_path('json/bet_list.json');
    
        // Check if the file exists
        if (!file_exists($filePath)) {
            return ['error' => 'File not found at ' . $filePath];
        }
    
        // Get the JSON content and decode it
        $fileContents = file_get_contents($filePath);
        $data = json_decode($fileContents, true);
    
        // Check if decoding failed
        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['error' => 'Invalid JSON format'];
        }
    
        // Debugging: Check the decoded data (optional, remove after testing)
        // Search for the matching round ID in the data
        if (isset($data['data']['bet_history']['data']) && is_array($data['data']['bet_history']['data'])) {
            // Loop through the "bet_history" data array
            foreach ($data['data']['bet_history']['data'] as $item) {
                if (isset($item['round']) && $item['round'] === $casinoBetId) {
                    return $item;  // Return the matched item
                }
            }
        }
    
        // If no match is found, return the 'No data found' message
        return ['message' => 'No data found for the given casino_bet_id.'];
    }
    
    // This function retrieves the bet list from the given JSON file
    public function getBetList(string $fileName): array
    {
        // Simulating data retrieval from a file or data source
        $path = storage_path('app/' . $fileName);  // assuming the file is stored in storage/app

        if (!file_exists($path)) {
            return ['error_message' => 'File not found.'];
        }

        $fileContents = file_get_contents($path);
        return json_decode($fileContents, true);  // Convert JSON to array
    }

    public function getOrderData(array $requestData): array
    {
        // Check if 'event_type_id' exists in the request data
        if (!isset($requestData['event_type_id'])) {
            return ['error' => 'Missing event_type_id'];
        }
    
        // Determine the file based on the event_type_id
        $fileName = '';
        if ($requestData['event_type_id'] == 311) {
            $fileName = 'cricket.json'; // For event_type_id = 311
        } elseif ($requestData['event_type_id'] == 99994) {
            $fileName = 'kabadi.json'; // For event_type_id = 99994
        } else {
            return ['error' => 'Unsupported event_type_id'];
        }
    
        // Path to the selected JSON file
        $filePath = storage_path('json/' . $fileName);  
    
        // Check if the file exists
        if (!file_exists($filePath)) {
            return ['error' => 'File not found at ' . $filePath];
        }
    
        // Read the file content and decode the JSON
        $fileContents = file_get_contents($filePath);
        $data = json_decode($fileContents, true);
        
        // Check for JSON decoding errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['error' => 'Invalid JSON format in the file'];
        }
    
        // Ensure the data structure is valid
        if (!isset($data['data']['orders']['data']) || !is_array($data['data']['orders']['data'])) {
            return ['error' => 'Invalid data structure in JSON file'];
        }
    
        // Initialize an empty array to store matching results
        $filteredData = [];
    
        // Filter data based on the provided criteria
        foreach ($data['data']['orders']['data'] as $item) {
            $matches = true;
    
            // Apply all filters
            if (isset($filters['start_date'], $filters['end_date']) &&
                ($item['created_at'] < $filters['start_date'] || $item['created_at'] > $filters['end_date'])
            ) {
                $matches = false;
            }
            if (isset($filters['event_type_id']) && $item['event_type_id'] != $filters['event_type_id']) {
                $matches = false;
            }
            if (isset($filters['type']) && $item['type'] !== $filters['type']) {
                $matches = false;
            }
            if (isset($filters['market_id']) && $item['market_id'] !== $filters['market_id']) {
                $matches = false;
            }
            if (isset($filters['is_matched']) && $item['is_matched'] != $filters['is_matched']) {
                $matches = false;
            }
    
            // If all filters match, add the item to the filtered results
            if ($matches) {
                $filteredData[] = $item;
            }
        }
    
        // Return the filtered data or a "No data found" message
        return !empty($filteredData)
            ? ['data' => $filteredData]
            : ['message' => 'No data found for the given filters.'];
    }


    

}
