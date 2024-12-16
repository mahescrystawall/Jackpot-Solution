<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProfitLossService;



class ProfitLossController extends Controller
{
    protected $profitLossService;

    // Inject AccountStatementService into the controller
    public function __construct(ProfitLossService $profitLossService)
    {
        $this->profitLossService = $profitLossService;
    }
    public function getProfitLoss(Request $request){
        $filters = [
            'start_date' => $request->input('start_date', Carbon::now()->subMonth()->format('Y-m-d')),  // Default to one month ago if no start date
            'end_date' => $request->input('end_date', Carbon::now()->format('Y-m-d')),  // Default to today if no end date
        ];
        $profitData = $this->profitLossService->getPfList($filters);
        
        // Return the view with all data and the filtered data for the last 16 days
        return view('profit_loss.index', [
            'startDate' => $filters['start_date'],
            'endDate' => $filters['end_date'],
            'profitData' => $profitData,
        ]);
    }
}
