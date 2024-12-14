<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Services\BetHistoryService;

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
        $eventTypeId = $startDate = $endDate = $isMatched = '';
        $events = null;

        if ($request->get('event_type_id')) {
            $eventTypeId = $request->get('event_type_id');
            $startDate = $request->get('start_date');
            $endDate = $request->get('end_date');
            $isMatched = $request->get('is_matched', 1);
        }

        $betHistoryData = $this->betHistoryService->getbetHistoryData();
        if (empty($betHistoryData['error'])) {
            return view('user/bet_history', [
                'events' => [],
                'pagination' => [],
                'error' => $betHistoryData['error'], // Pass error message to view
            ]);
        }
        $events = $betHistoryData['data']['orders'];
        $pagination = $betHistoryData['data']['orders']['links'];
        return view('user/bet_history/bet_history', compact('events','pagination','startDatecal','endDatecal'));
    }
}
?>