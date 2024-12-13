<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\AccountStatementService;

class AccountStatementController extends Controller
{
    protected $accountStatementService;

    // Inject AccountStatementService into the controller
    public function __construct(AccountStatementService $accountStatementService)
    {
        $this->accountStatementService = $accountStatementService;
    }

    // Show form with account statements
   
   
    public function showForm(Request $request)
    {
        // Default filters for the date range (initially showing all data)
        $filters = [
            'start_date' => $request->input('start_date', Carbon::now()->subMonth()->format('Y-m-d')),  // Default to one month ago if no start date
            'end_date' => $request->input('end_date', Carbon::now()->format('Y-m-d')),  // Default to today if no end date
            'category' => $request->input('category', ''), // Default to no category if not provided
        ];
    
        // Fetch all account statement data (initially without filtering for the last 16 days)
        $allData = $this->accountStatementService->getAccountStatement($filters);
    
        // If there is an error in fetching data, pass error message to the view
        if (isset($allData['error'])) {
            return view('account_statement.index', [
                'startDate' => $filters['start_date'],
                'endDate' => $filters['end_date'],
                'filteredData' => [],  // Empty filtered data
                'error' => $allData['error'], // Show error message
            ]);
        }
    
        // Filter the data for the last 16 days (only when showing filtered data)
        $filteredData = [];
        $currentDate = Carbon::now();
       $filteredData =$allData['data'];

    
        // Return the view with all data and the filtered data for the last 16 days
        return view('account_statement.index', [
            'startDate' => $filters['start_date'],
            'endDate' => $filters['end_date'],
            'filteredData' => $filteredData, // Use the filtered data for the last 16 days
        ]);
    }
    

    public function fetchCasinoBetHistory(Request $request)
    {
        // Get the bet data using your service
        $id = ['type_id' => '803d0e34-8b1e-434b-a714-b5641d92da08'];
        $casinoBetId = $request->input('casino_bet_id'); 
        $betHistory = $this->accountStatementService->getBetList($casinoBetId); // Assuming this returns the bet history

        // Return the data as a JSON response
        return response()->json($betHistory);
    }
    
}
