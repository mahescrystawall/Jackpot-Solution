<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\AccountStatementService;



class AccountStatementController extends Controller
{
    protected $accountStatementService;

    // Inject StakeService into the controller
    public function __construct(AccountStatementService $accountStatementService)
    {
        $this->accountStatementService = $accountStatementService;
    }
    public function showForm(Request $request)
    {
        // Get filters from request
        $filters = $request->only(['start_date', 'end_date', 'category']);
        
        // Use the service to fetch the filtered data
        $filteredData = $this->accountStatementService->getAccountStatement($filters);

        // Return the view with the data
        return view('account_statement.index', [
            'startDate' => $request->input('start_date', Carbon::now()->subMonth()->toDateString()),
            'endDate' => $request->input('end_date', Carbon::now()->toDateString()),
            'filteredData' => $filteredData ?: [],
        ]);
    }
    
    public function fetchCasinoBetHistory(Request $request)
    {
        // Validate input
        $betStatus = $request->input('betStatus'); // 'matched' or 'deleted'
    
        // Static data for demo purposes
        $data = [
            ['sr_no' => 1, 'round_id' => '320922658051522400', 'side' => 'back', 'game_id' => '151067', 'game_code' => 'MAC88-CAVB100', 'amount' => 100, 'place_date' => '2024-11-20'],
            // Additional rows...
        ];
    
        // Optionally filter data based on bet status
        if ($betStatus == 'matched') {
            $data = collect($data)->filter(function ($item) {
                return $item['side'] === 'back'; // Example filter condition for matched
            })->toArray();
        }
    
        // Return the data as JSON
        return response()->json($data);
    }
}

?>
