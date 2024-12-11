<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\IBetService;
use Carbon\Carbon;

class BetController extends Controller
{
    public $_betService;

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
        // Use the BetService to get the unsettled bets
        $data = $this->_betService->getBetData('unsettled_bet.json');

        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }
        return response()->json($data, 200);
    }

    /**
     * Fetch the bet history from the JSON file and return it as a JSON response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBetHistory(Request $request)
    {

        $postData = $request->all();
        try {
            $startDate = Carbon::parse($postData['start_date']);
            $endDate = Carbon::parse($postData['end_date']);
        } catch (\Exception $e) {
            return response()->json(['error_message' => 'Invalid date format'], 400);
        }
        $data = $this->_betService->getBetHistoryData('bet_history.json', $postData, $startDate, $endDate);

        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }

        // Return the data as a JSON response
        return response()->json($data, 200);
    }
}
