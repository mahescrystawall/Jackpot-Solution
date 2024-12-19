<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProfitLossService;
use Carbon\Carbon;

class ProfitLossController extends Controller
{
    //

    protected $profitLossService;
    //
    public function __construct(ProfitLossService $profitLossService)
    {
        $this->profitLossService = $profitLossService;
    }

    public function index(Request $request)
    {
        $apiUrl = 'http://127.0.0.1:8081/api/profit-loss';
        $startDate = $request->input('start_date', Carbon::now()->subDays(16)->format('Y-m-d')); // 16 days before today
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d')); // Today

        $filters = [
            'start_date' => $startDate,  // Default to one month ago if no start date
            'end_date' => $endDate,  // Default to today if no end date
        ];
        // dd($filters);
        $profitApiData = $this->profitLossService->getProfitLossData($apiUrl, $filters);
     

        // For AJAX request, return the HTML for the table and pagination
        if ($request->ajax()) {

            $profitData = $profitApiData['data'];
            $pagination = $profitApiData['pagination'];
            return response()->json([
                'data' => view('user.profit_loss.section_table_body', compact('profitData', 'pagination'))->render(), // Render the table rows
                'pagination' => view('pagination.index', compact('pagination'))->render(), // Render the pagination
              
            ]);
        } else {
            return view('user.profit_loss.profit_loss',  [
                'startDate' => $filters['start_date'],
                'endDate' => $filters['end_date'],
                'profitData' => $profitApiData['data'],
                'pagination' => $profitApiData['pagination'],
            ]);
        }
    }
}
