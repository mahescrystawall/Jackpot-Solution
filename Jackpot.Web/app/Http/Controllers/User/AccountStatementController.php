<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BetHistoryService;
use App\Services\AccountStatementService;





class AccountStatementController extends Controller
{
    protected $accountStatementService;
    protected $betHistoryService;

    // Inject AccountStatementService into the controller
    public function __construct(AccountStatementService $accountStatementService, BetHistoryService $betHistoryService)
    {
        $this->accountStatementService = $accountStatementService;
        $this->betHistoryService = $betHistoryService;
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
        $paginationData = $this->accountStatementService->getPaginatedAccountStatement($filters);

        // Fetch paginated data using the filters

        // If there is an error in fetching data, pass error message to the view
        if (isset($data['error'])) {
            return view('account_statement.index', [
                'startDate' => $filters['start_date'],
                'endDate' => $filters['end_date'],
                'filteredData' => [],  // Empty filtered data
                'error' => $data['error'], // Show error message
            ]);
        }

        // Fetch all sports (if needed)
        $allSports = $this->betHistoryService->getAllSports();

        // Return the view with all data and the filtered data for the paginated results
        return view('account_statement.index', [
            'startDate' => $filters['start_date'],
            'endDate' => $filters['end_date'],
            'allSports' => $allSports,
            'paginationData' => $paginationData
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
