<?php

namespace App\Services;

use App\Interfaces\IBetService;
use App\Traits\FileHelper;
use Carbon\Carbon;

class BetService implements IBetService
{
    use FileHelper;

    public function getBetData(string $fileName): array
    {
        return $this->getDataFromFile($fileName);
    }

    /**
     * Fetch the bet history from the JSON file and return it as a JSON response.
     *
     * @param string $fileName
     * @param array $queryParams
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return array
     */
    public function getBetHistoryData(string $fileName, array $queryParams = [], Carbon $startDate = null, Carbon $endDate = null): array
    {
        $filePath = storage_path('json/' . $fileName);

        if (!file_exists($filePath)) {
            return ['error_message' => 'File not found'];
        }

        $data = json_decode(file_get_contents($filePath), true);

        if (!isset($data['data']['orders']['data'])) {
            return ['error_message' => 'Invalid file structure'];
        }

        $orders = $data['data']['orders']['data'];

        // Filter orders dynamically based on the query parameters and date range
        $filteredOrders = array_filter($orders, function ($order) use ($queryParams, $startDate, $endDate) {
            // Filter based on the query parameters
            foreach ($queryParams as $key => $value) {
                if (isset($order[$key]) && $order[$key] != $value) {
                    return false; // Exclude this order if any condition doesn't match
                }
            }

            // Filter based on the date range (if provided)
            if ($startDate && $endDate) {
                $matchedAt = Carbon::parse($order['matched_at']);
                if ($matchedAt < $startDate || $matchedAt > $endDate) {
                    return false; // Exclude this order if it falls outside the date range
                }
            }

            return true; // Include this order if all conditions match
        });

        // Re-index array after filtering to avoid gaps in array keys
        $filteredData = array_values($filteredOrders);

        return $filteredData; // Return the filtered data
    }
}
