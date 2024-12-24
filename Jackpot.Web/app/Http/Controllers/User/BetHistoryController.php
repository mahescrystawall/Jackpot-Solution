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

    public function index1(Request $request)
    {
        // $startDatecal = Carbon::now()->subDays(5)->toDateString();
        // $endDatecal = Carbon::now()->toDateString();
        $eventTypeId = $request->event_type_id ?? 4;
        // $startDate = $request->start_date ?? Carbon::now()->subDays(5)->toDateString(); // Getting from form or default date
        // $endDate = $request->end_date ?? Carbon::now()->toDateString(); // Getting from form or current date
        $isMatched = $request->is_matched ?? 1; // Default to matched
        $startDate = $request->input('start_date', Carbon::now()->subDays(10)->format('Y-m-d')); // 16 days before today
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d')); // Today

        $allSports = $this->betHistoryService->getAllSports();

        $categories = $allSports['data']['menu'];
        // Ensure $betHistoryData contains paginated data
        $betHistoryData = $this->betHistoryService->getbetHistoryData($eventTypeId, $startDate, $endDate, $isMatched);

        // Paginate the results (assuming it's an array or collection of data)
        $events = $betHistoryData;

        $pagination = '';
        // For AJAX request, return the HTML for the table and pagination
        if ($request->ajax()) {

            $profitData = $events;
            $pagination = $events['pagination'];
            return response()->json([
                'data' => view('user.bet_history.section_table_body', [
                    'events' => $events,

                ])->render(), // Render the table rows
                'pagination' => view('pagination.index', compact('pagination'))->render(), // Render the pagination

            ]);
        } else {
            return view('user.bet_history.bet_history',  [
                'startDate' => $startDate,
                'endDate' => $endDate,
                'events' => $events,
                'pagination' => $pagination,
                'categories' => $categories
            ]);
            // return view('user/bet_history/bet_history', compact('events', 'startDate', 'endDate','categories'));

        }
    }

    public function index(Request $request)
    {

        $eventTypeId = $request->event_type_id ?? 4;

        $isMatched = $request->is_matched ?? 'matched'; // Default to matched
        $startDate = $request->input('start_date', Carbon::now()->subDays(30)->format('Y-m-d')); // 16 days before today
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d')); // Today

        $allSports = $this->betHistoryService->getAllSports();

        $categories = $allSports['data']['menu'];

        $userID = 7;
        $page = 1;
        $page_size = 10;
        $orderBy = 'created_on';
        $orderDirection = 'ASC';
        $eventTypeId = $request->event_type_id ?? null;
        $status = $request->is_mathched ?? 'matched';

        $params = [
            'user_id' => $userID,
            'page' => $page,
            'page_size' => $page_size,
            'order_by' => $orderBy,
            'order_direction' => $orderDirection,
            'event_type_id' => $eventTypeId,
            //  'FilterStatus' => $status,
            'start_date' => $startDate,
            'end_date' => $endDate

        ];

        // dd($params);
        $betHistoryData = $this->betHistoryService->getbetHistoryData($params);

        $events =  $betHistoryData;
        $pagination = [];
        //dd($betHistoryData);
        return view('user.bet_history.bet_history',  [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'events' => $events,
            'pagination' => $pagination,
            'categories' => $categories
        ]);
        // $betHistoryData = $this->betHistoryService->getbetHistoryData($);


    }
}
