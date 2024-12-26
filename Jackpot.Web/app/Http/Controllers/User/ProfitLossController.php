<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProfitLossService;
use App\Constants\Constants;
use Carbon\Carbon;

class ProfitLossController extends Controller
{
    protected $profitLossService;

    public function __construct(ProfitLossService $profitLossService)
    {
        $this->profitLossService = $profitLossService;
    }

    public function index(Request $request)
    {
        $apiUrl = 'http://127.0.0.1:8081/api/profit-loss';

        // Set up filters with defaults
        $filters = [
            'start_date' => $request->input('start_date', Carbon::now()->subDays(15)->format('Y-m-d')),
            'end_date' => $request->input('end_date', Carbon::now()->format('Y-m-d')),
            'user_id' => session('user_id'),
            'page' => $request->input('page', Constants::DEFAULT_PAGE),
            'page_size' => $request->input('page_size', Constants::DEFAULT_PAGE_SIZE),
            'order_direction' => $request->input('order_direction', Constants::DEFAULT_ORDER_DIRECTION),
            'order_by' => $request->input('order_by', Constants::DEFAULT_ORDER_BY),
        ];

        // Fetch profit/loss data from service
        $profitLossData = $this->profitLossService->getProfitLossData($apiUrl, $filters);

        // Check if request is AJAX and return partial views
        if ($request->ajax()) {
            $tableBody = view('user.profit_loss.section_table_body', [
                'profitData' => $profitLossData['data'] ?? [],
            ])->render();

            return response()->json(['data' => $tableBody]);
        }

        // Return the main view
        return view('user.profit_loss.profit_loss', [
            'startDate' => $filters['start_date'],
            'endDate' => $filters['end_date'],
            'profitData' => $profitLossData ?? [],
            'pagination' => $profitLossData['pagination'] ?? null,
        ]);
    }
}
