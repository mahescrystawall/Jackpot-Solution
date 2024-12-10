<?php
namespace App\Services;

use App\Interfaces\IBetService;
use App\Traits\FileHelper;

class BetService implements IBetService
{
    use FileHelper;

    public function getBetData(string $fileName): array
    {
        return $this->getDataFromFile($fileName);
    }


    public function getBetHistoryData(string $fileName, $eventTypeId = null): array
    {
        $filePath = storage_path('json/' . $fileName);

        if (!file_exists($filePath)) {
            return ['error_message' => 'File not found'];
        }

        $data = json_decode(file_get_contents($filePath), true);
//dd($data);
        if ($eventTypeId !== null) {
            // Filter orders where event_type_id matches the specified value
            $filteredOrders = array_filter($data['data']['orders']["data"], function ($order) use ($eventTypeId) {
                // Ensure that $order is an array before accessing its keys
                return is_array($order) && isset($order['event_type_id']) && $order['event_type_id'] == $eventTypeId;
            });

            // Re-index array after filtering to avoid gaps in array keys
            $filteredData = array_values($filteredOrders);

            return $filteredData;  // Return the filtered data
        }

        // If no eventTypeId filter is applied, return the whole data set
        return $data['data']['orders'];
    }

}
