<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\IAccountStatementService;


class AccountController extends Controller
{
    protected $accountStatementService;

    // Inject StakeService into the controller
    public function __construct(IAccountStatementService $accountStatementService)
    {
        $this->accountStatementService = $accountStatementService;
    }
    public function getStatementData(Request $request)
    {
        $filters = [
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'category' => $request->input('category', 'ALL'), // Default to "ALL" if no category is provided
        ];

        $fileName = 'account_statement.json';
        $data = $this->accountStatementService->getAccountStatement($fileName, $filters);

        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }

        return response()->json($data, 200);
    }


    public function getBetData(Request $request)
    {
        // Get the casino_bet_id from the request payload
        $casinoBetId = $request->input('casino_bet_id');
        // Validate that the casino_bet_id is provided
        if (!$casinoBetId) {
            return response()->json(['message' => 'casino_bet_id is required.'], 400);
        }

        // Get bet data from the service
        $betData = $this->accountStatementService->getCasinoData($casinoBetId);

        // If there is an error or no data found, return it
        if (isset($betData['error']) || isset($betData['message'])) {
            return response()->json($betData, isset($betData['error']) ? 400 : 404);
        }

        // Return the found bet data
        return response()->json($betData, 200);
    }


    public function getBetHistoryData(Request $request)
    {
        $requestData = [
            'start_date'     => $request->input('start_date'),
            'end_date'       => $request->input('end_date'),
            'event_type_id'  => $request->input('event_type_id'),
            'type'           => $request->input('type', 'MARKET'),
            'market_id'      => $request->input('market_id'),
            'is_matched'     => $request->input('is_matched'),
        ];
        
        $betData = $this->accountStatementService->getOrderData($requestData);
    
        // Handle errors or empty responses
        if (isset($betData['error']) || isset($betData['message'])) {
            return response()->json([
                'error'   => $betData['error'] ?? true,
                'message' => $betData['message'] ?? 'No data found for the given criteria.'
            ], isset($betData['error']) ? 400 : 404);
        }
    
        // Return the successful bet data response
        return response()->json($betData, 200);
    }
    
}
