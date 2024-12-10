<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\IBetService;
use App\Services\BetService;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBetHistory()
    {
        // Use the BetService to get the bet history
        $data = $this->_betService->getBetData('bet_history.json');

        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }
        return response()->json($data, 200);
    }
}
