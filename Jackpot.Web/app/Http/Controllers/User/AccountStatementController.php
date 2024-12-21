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
    public function showAccountStatement(Request $request)
    {
        $filters = [
            'start_date' => Carbon::parse($request->input('start_date', Carbon::now()->subMonth()->format('Y-m-d')))
                                ->format('Y-m-d'),
            'end_date' => Carbon::parse($request->input('end_date', Carbon::now()->format('Y-m-d')))
                                ->format('Y-m-d'),
            'category' => $request->input('category', 'ALL'),
        ];

        // Fetch the paginated account statement data
        $paginationData = $this->accountStatementService->getPaginatedAccountStatement($filters);
     $menuData=  $paginationData['menuData'];

        // Debugging data (remove in production)

        // Handle errors during data retrieval
        if (isset($paginationData['error'])) {
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => $paginationData['error'],
                ], 400);
            }

            return view('user.accounts.account_statement', [
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
        return view('user.accounts.account_statement', [
            'startDate' => $filters['start_date'],
            'endDate' => $filters['end_date'],
            'paginationData' => $paginationData,
            'allSports' => $allSports,
             'menuData' => $menuData

        ]);
    }
}
