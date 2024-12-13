<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UnsettledService;
use Carbon\Carbon;
class UnsettledBetController extends Controller
{
    protected $unsettledService;
    //
    public function __construct(UnsettledService $unsettledService)
    {
        $this->unsettledService = $unsettledService;
    }

    public function index(Request $request)
    {


            $isMatched = $request->get('is_matched', 1);

        $unSettledBetsData = $this->unsettledService->getBetHistoryData( $isMatched);
        $events = $unSettledBetsData;
        $pagination = $unSettledBetsData;
        return view('user/unsettled_bet', compact('events', 'pagination'));
    }
}
