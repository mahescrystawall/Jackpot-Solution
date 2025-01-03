<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Interfaces\IAccountStatementService;
use App\Traits\AuthorizeTrait;

class AccountController extends Controller
{
    use ApiResponseTrait, AuthorizeTrait;
    protected $accountStatementService;

    // Inject StakeService into the controller
    public function __construct(IAccountStatementService $accountStatementService)
    {
        $this->accountStatementService = $accountStatementService;
    }
    public function getStatementData(Request $request)
    {
        // if(!$this->isOwner($request->user_id)){
        //     return $this->sendError('Unauthorized', 401);
        // }

        try {

            $result = $this->accountStatementService->getAccountStatement($request->all());

            return $this->sendResponse(
                $result,
                "Account Statement report fetched successfully.",
                200
            );
        } catch (\Throwable $th) {
            Log::channel(env('LOG_CHANNEL'))->error('An error occurred in the custom log.' . $th);
            return $this->sendError($th);
        }

        // $filters = [
        //     'start_date' => $request->input('start_date'),
        //     'end_date' => $request->input('end_date'),
        //     'category' => $request->input('category', 'ALL'), // Default to "ALL" if no category is provided
        // ];

        // $fileName = 'account_statement.json';
        // $data = $this->accountStatementService->getAccountStatement($fileName, $filters);

        // if (isset($data['error_message'])) {
        //     return response()->json($data, 400);
        // }

        // return response()->json($data, 200);
    }

    // public function getBetData()
    // {
    //         $data = $this->accountStatementService->getBetList('bet_list.json');
    //         if (isset($data['error_message'])) {
    //             return response()->json($data, 400);
    //         }
    //         return response()->json($data, 200);
    // }



}
