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
        $eventTypeId ='';
        $events = null;
        if($request->get('event_type_id')){
            $eventTypeId = $request->get('event_type_id');
        }
        $allSports=$this->betHistoryService->getAllSports();
        $betHistoryData = $this->betHistoryService->getbetHistoryData($eventTypeId);
         $events = $betHistoryData;
        // / dd($betHistoryData['links']);
         $pagination = $betHistoryData;



        // if (empty($betHistoryData['error'])) {
        //     return view('user/bet_history', [
        //         'events' => [],
        //         'pagination' => [],
        //         'error' => $betHistoryData['error'], // Pass error message to view
        //     ]);
        // }

        return view('user/bet_history', compact('events','pagination','allSports'));
    }
}
?>
