<?php

namespace App\Services;

use App\Interfaces\IBetService;
use App\Traits\FileHelper;
use App\Procedures\Procedure;
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
    public function getBetHistoryData(string $fileName, array $queryParams = [],  $startDate = null,  $endDate = null): array
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


        $filteredOrders = array_filter($orders, function ($order) use ($queryParams, $startDate, $endDate) {

            foreach ($queryParams as $key => $value) {
                if ($key === 'event_type_id' && $value === null) {
                    continue;
                }
                if (isset($order[$key]) && $order[$key] != $value) {
                    return false;
                }
            }


            if ($startDate && $endDate) {
                $matchedAt = Carbon::parse($order['matched_at']);
                if ($matchedAt < $startDate || $matchedAt > $endDate) {
                    return false;
                }
            }
            return true;
        });

        $filteredData = array_values($filteredOrders);

        return $filteredData; // Return the filtered data
    }

    //NEW
    public function unsettledBet($data)
    {
        try {
            $data = Procedure::ExecuteProcedure('Get_Unsettled_Bets', $data);

            return collect($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
