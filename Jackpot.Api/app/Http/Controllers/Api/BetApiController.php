<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BetHistoryRequest;
use App\Interfaces\IBetService;
use Illuminate\Http\Request;

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
    public function getBetHistory(Request $request)
    {
        // Use BetHistoryRequest to get validated and formatted date range
        // $dateRange = $request->getDateRange();
        // $startDate = $dateRange['startDate'];
        // $endDate = $dateRange['endDate'];
        // $postData = $dateRange['postData'];

        $userID = $request->user_id;
        $page = $request->page;
        $page_size = $request->page_size;
        $orderBy = 'created_on';
        $orderDirection = 'ASC';
        $eventTypeId = $request->event_type_id ?? 1;
        $status = $request->is_mathched ?? 'matched';
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $params = [
            'user_id' => $userID,
            'page' => $page,
            'page_size' => $page_size,
            'order_by' => $orderBy,
            'order_direction' => $orderDirection,
            'event_type_id' => $eventTypeId,
            // 'FilterStatus' => $status,
            'start_date' => $startDate,
            'end_date' => $endDate

        ];

        // return $request->all();
        $data = $this->_betService->getBetHistoryData($params);
        // return $data;
        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }

        return response()->json($data, 200);
    }
}
