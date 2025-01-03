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

        // $eventTypeId = $request->event_type_id ?? 4;
        if ($request->ajax()) {
            $startDate = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');
        } else {
            $startDate = $request->input('start_date', Carbon::now()->subDays(30)->format('Y-m-d')); // 16 days before today
            $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d')); // Today
        }
        $allSports = $this->betHistoryService->getAllSports();

        $categories = $allSports;

        $userID = session('user_id');
        $page = 1;
        $page_size = 10;
        $orderBy = 'created_on';
        $orderDirection = 'ASC';
        $eventTypeId = $request->event_type_id ?? null;

        $params = [
            'user_id' => $userID,
            'page' => $page,
            'page_size' => $page_size,
            'order_by' => $orderBy,
            'order_direction' => $orderDirection,
            'event_type_id' => $eventTypeId,
            'start_date' => $startDate,
            'end_date' => $endDate

        ];

        $betHistoryData = $this->betHistoryService->getbetHistoryData($params);

        $events =  $betHistoryData['data'];
        // $pagination = [];
        if ($request->ajax()) {

            // $pagination = $events['pagination'];
            return response()->json([
                'data' => view('user.bet_history.section_table_body', [
                    'events' => $events,
                ])->render(),

                // 'pagination' => view('pagination.index', compact('pagination'))->render(), // Render the pagination

            ]);
        } else {
            return view('user.bet_history.bet_history',  [
                'startDate' => $startDate,
                'endDate' => $endDate,
                'events' => $events,
                // 'pagination' => $pagination,
                'categories' => $categories
            ]);
        }
    }
}
