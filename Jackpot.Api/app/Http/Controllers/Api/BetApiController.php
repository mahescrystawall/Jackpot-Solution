<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BetHistoryRequest;
use App\Interfaces\IBetService;

class BetApiController extends Controller
{
    protected $_betService;

    public function __construct(IBetService $betService)
    {
        $this->_betService = $betService;
    }

    /**
     * Fetch the unsettled bets from the JSON file and return them as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUnsettledBets()
    {
        $data = $this->_betService->getBetData('unsettled_bet.json');

        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }

        return response()->json($data, 200);
    }

    /**
     * Fetch the bet history from the JSON file and return it as a JSON response.
     *
     * @param BetHistoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBetHistory(BetHistoryRequest $request)
    {
        // Use BetHistoryRequest to get validated and formatted date range
        $dateRange = $request->getDateRange();
        $startDate = $dateRange['startDate'];
        $endDate = $dateRange['endDate'];
        $postData = $dateRange['postData'];

        $data = $this->_betService->getBetHistoryData('bet_history.json', $postData, $startDate, $endDate);

        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }

        return response()->json($data, 200);
    }
}
