<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BetHistoryService;
use Carbon\Carbon;
class BetHistoryController extends Controller
{
    protected $betHistoryService;
    //
    public function __construct(BetHistoryService $betHistoryService)
    {
        $this->betHistoryService = $betHistoryService;
    }

    public function index(Request $request)
    {
        $startDatecal = Carbon::now()->subDays(5)->toDateString();
        $endDatecal = Carbon::now()->toDateString();
        $eventTypeId = 4;
        $startDate = $request->start_date ?? '2024-01-01'; // Getting from form or default date
        $endDate = $request->end_date ?? Carbon::now()->toDateString(); // Getting from form or current date
        $isMatched = $request->is_matched ?? 1; // Default to matched

        $allSports = $this->betHistoryService->getAllSports();

        $categories = $allSports['data']['menu'];
        // Ensure $betHistoryData contains paginated data
        $betHistoryData = $this->betHistoryService->getbetHistoryData($eventTypeId, $startDate, $endDate, $isMatched);

        // Paginate the results (assuming it's an array or collection of data)
        $events =$betHistoryData;
        return view('user/bet_history/bet_history', compact('events', 'startDate', 'endDate','categories'));
    }

}
