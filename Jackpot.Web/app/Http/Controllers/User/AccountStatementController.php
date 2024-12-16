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

    // Inject AccountStatementService and BetHistoryService into the controller
    public function __construct(AccountStatementService $accountStatementService, BetHistoryService $betHistoryService)
    {
        $this->accountStatementService = $accountStatementService;
        $this->betHistoryService = $betHistoryService;
    }

    // Show form with account statements
    public function showForm(Request $request)
    {
        $filters = [
            'start_date' => Carbon::parse($request->input('start_date', Carbon::now()->subMonth()->format('Y-m-d')))->format('Y-m-d'),
            'end_date' => Carbon::parse($request->input('end_date', Carbon::now()->format('Y-m-d')))->format('Y-m-d'),
            'category' => $request->input('category', 'ALL'),
        ];

        // Fetch the paginated account statement data
        $paginationData = $this->accountStatementService->getPaginatedAccountStatement($filters);
        $menuData=  $paginationData['menuData'];

        // Debugging data (remove in production)
        // dd($paginationData);

        // Handle errors during data retrieval
        if (isset($paginationData['error'])) {
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => $paginationData['error'],
                ], 400);
            }

            return view('account_statement.index', [
                'error' => $paginationData['error'],
            ]);
        }

        // Fetch additional data like sports (if needed)
        $allSports = $this->betHistoryService->getAllSports();

        // Return JSON response for API users
        if ($request->wantsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Data fetched successfully',
                'startDate' => $filters['start_date'],
                'endDate' => $filters['end_date'],
                'paginationData' => $paginationData,
                'allSports' => $allSports,
            ]);
        }

        // Return a Blade view for browser users
        return view('account_statement.index', [
            'startDate' => $filters['start_date'],
            'endDate' => $filters['end_date'],
            'paginationData' => $paginationData,
            'allSports' => $allSports,
            'menuData' => $menuData

        ]);
    }


    // Fetch casino bet history
    public function fetchCasinoBetHistory(Request $request)
    {
        // Validate the casino_bet_id to make sure it's provided


        // Get the bet data using your service
        $casinoBetId = $request->input('casino_bet_id');
        $betHistory = $this->accountStatementService->getBetList($casinoBetId); // Assuming this returns the bet history

        // Return the data as a JSON response
        return response()->json($betHistory);
    }
}
