<?php
namespace App\Http\Controllers\Api;

use App\Services\BetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBetRequest;
use Illuminate\Support\Facades\Storage;

class BetController extends Controller
{
    protected $betService;

    public function __construct(BetService $betService)
    {
        $this->betService = $betService;
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
        $data = $this->betService->getBetData('unsettled_bet.json');

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
        $data = $this->betService->getBetData('bet_history.json');

        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }
        return response()->json($data, 200);
    }

    /**
     * Create bet
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function createBet(CreateBetRequest $request)
    {
        $data = $this->betService->createBet($request->all());
        if (!$data['success']) {
            Log::channel('error_log')->error('Error creating bet: ' . $data['message']);
            return;
        }

        return response()->json($data, 200);
    }



}
