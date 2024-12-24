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

    public function getBetData()
    {       
            $data = $this->accountStatementService->getBetList('bet_list.json');
            if (isset($data['error_message'])) {
                return response()->json($data, 400);
            }
            return response()->json($data, 200);
    }

    
 
}
