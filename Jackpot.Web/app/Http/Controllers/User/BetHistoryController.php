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
        $betHistoryData = $this->betHistoryService->getbetHistoryData();
        $allSports=$this->betHistoryService->getAllSports();
        if (empty($betHistoryData['error'])) {
            return view('user/bet_history', [
                'events' => [],
                'pagination' => [],
                'error' => $betHistoryData['error'], // Pass error message to view
            ]);
        }
        $events = $betHistoryData['data']['orders'];
        $pagination = $betHistoryData['data']['orders']['links'];
        return view('user/bet_history', compact('events','pagination','allSports'));
    }
}
?>
