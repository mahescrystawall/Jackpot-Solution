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

    
    

    public function getBetList(string $fileName): array
    {
        return $this->getDataFromFile($fileName);
    }
}
