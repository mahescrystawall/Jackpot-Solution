<?php

namespace App\Services;

use App\Interfaces\IProfitLossService;

class ProfitLossService implements IProfitLossService
{
    /**
     * Fetch the profit and loss data from the JSON file.
     *
     * @return array
     */
    public function getProfitLossData(string $apiUrl = null, array $filters): array
    {
        // Path to the profit and loss JSON file
        $path = storage_path('json/profit_loss.json'); //$apiUrls

        // Check if file exists
        if (file_exists($path)) {
            // Read the file content
            $json = file_get_contents($path);


            // Decode JSON to array
            $data =  json_decode($json, true);
            // Validate the data
            if (!is_array($data)) {
                return ['error' => 'Invalid JSON format'];
            }
            // Initialize the profitLossData array from data
            $profitLossData = $data['data']['profit_loss']['data'];

            // Extract filters
            $startDate = $filters['start_date'] ?? null;
            $endDate = $filters['end_date'] ?? null;
            // Apply date filter if start_date and/or end_date are provided
            if ($startDate || $endDate) {
                $startDate = $startDate ? \Carbon\Carbon::parse($startDate)->startOfDay() : null;
                $endDate = $endDate ? \Carbon\Carbon::parse($endDate)->endOfDay() : null;

                $profitLossData = array_filter($profitLossData, function ($item) use ($startDate, $endDate) {
                    // Ensure `created_at` exists and is a valid date
                    if (!isset($item['created_at']) || !strtotime($item['created_at'])) {
                        return false; // Skip invalid dates
                    }

                    $createdAt = \Carbon\Carbon::parse($item['created_at']); // Parse the created_at field

                    // If start date is set, make sure the created date is after or equal to the start date
                    if ($startDate && $createdAt->lt($startDate)) {
                        return false; // Skip if created_at is before start date
                    }

                    // If end date is set, make sure the created date is before or equal to the end date
                    if ($endDate && $createdAt->gt($endDate)) {
                        return false; // Skip if created_at is after end date
                    }

                    return true; // Include the record if it passes both date filters
                });
            }

            // Reset keys for filtered data
            $filteredData = array_values($profitLossData);


            // Extract pagination details if available
            $pagination = $data['data']['profit_loss'] ?? null;
            //return ($pagination);
            $paginationDetails = $pagination ? [
                'current_page' => $pagination['current_page'] ?? 1,
                "last_page" => $pagination['last_page'],
                'first_page_url' => $pagination['first_page_url'] ?? 1,
                'last_page_url' => $pagination['last_page_url'] ?? null,
                'next_page_url' => $pagination['next_page_url'] ?? null,
                'path' => $pagination['path'] ?? null,
                'per_page' => $pagination['per_page'] ?? 50,
                'prev_page_url' => $pagination['prev_page_url'] ?? null,
                'to' => $pagination['to'] ?? null,
                'total' => $pagination['total'] ?? null,
            ] : null;

            // Prepare the response data
            return [
                'status' => true,
                'message' => 'Filtered records found',
                'data' => $filteredData,
                'pagination' => $paginationDetails,
            ];
        }

        return ['message' => 'File not found'];
    }
}
