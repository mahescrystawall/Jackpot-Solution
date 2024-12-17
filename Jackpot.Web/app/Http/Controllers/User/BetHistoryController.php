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
        $startDate = '2024-01-01';
        $endDate = Carbon::now()->toDateString();
        $isMatched = 1;
        $allSports = $this->betHistoryService->getAllSports();
        $betHistoryData = $this->betHistoryService->getbetHistoryData($eventTypeId, $startDate, $endDate, $isMatched);
        $events = $betHistoryData;

        $pagination = $betHistoryData;
        return view('user/bet_history/bet_history', compact('events','pagination','startDatecal','endDatecal'));
    }
}
