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
    
        // Check if the file exists
        if (!File::exists($filePath)) {
            return ['error' => 'File not found'];
        }
    
        // Read the file contents
        $fileContents = File::get($filePath);
    
        // Decode the JSON into an array
        $data = json_decode($fileContents, true);
    
        // Initialize the transactions array from data
        $transactions = $data['data']['transactions']['data'];
    
        // Apply date and category filters if they are set
        if (isset($filters['start_date']) && isset($filters['end_date'])) {
            // Ensure the start and end dates include time (defaulting to '00:00:00' if time is not provided)
            $startDate = date('Y-m-d 00:00:00', strtotime($filters['start_date']));
            $endDate = date('Y-m-d 23:59:59', strtotime($filters['end_date']));
    
            // Filter the transactions based on 'created_at' date range and 'event_type_id' (category filter)
            $filteredTransactions = array_filter($transactions, function ($item) use ($startDate, $endDate, $filters) {
                // Check if 'created_at' exists and is a valid date
                if (isset($item['created_at']) && strtotime($item['created_at']) !== false) {
                    $createdAtTimestamp = strtotime($item['created_at']);
    
                    // Check if 'event_type_id' is provided and if it matches the 'category' filter
                    $sportsFilterPassed = true;
                    if (!empty($filters['category']) && isset($item['event_type_id']) && $item['event_type_id'] != $filters['category']) {
                        $sportsFilterPassed = false;  // Exclude if event_type_id doesn't match the category filter
                    }
    
                    // Compare the timestamps of 'created_at' with the start and end date range
                    return $createdAtTimestamp >= strtotime($startDate) && $createdAtTimestamp <= strtotime($endDate) && $sportsFilterPassed;
                }
                return false; // Exclude the item if 'created_at' is not valid or not present
            });
        } else {
            // If no date filters are set, just apply the event_type_id filter (category filter)
            $filteredTransactions = array_filter($transactions, function ($item) use ($filters) {
                // Check if 'event_type_id' is provided and if the transaction's 'event_type_id' matches
                if (!empty($filters['category']) && isset($item['event_type_id']) && $item['event_type_id'] == $filters['category']) {
                    return true;  // Include the item if event_type_id matches
                }
                return empty($filters['category']) || !isset($item['event_type_id']);
            });
        }
    
        // Re-index the filtered array to reset keys (like JSON)
        $filteredTransactions = array_values($filteredTransactions);
    
        // If no records were found after filtering
        if (empty($filteredTransactions)) {
            return [
                'status' => false,
                'message' => 'No records found after filtering',
                'data' => []
            ]; // Return as an array instead of JsonResponse
        }
    
        // Return the filtered transactions as an array
        return [
            'status' => true,
            'message' => 'Filtered records found',
            'data' => $filteredTransactions
        ];
    }
    


    public function getBetList(string $fileName): array
    {
        return $this->getDataFromFile($fileName);
    }
}
