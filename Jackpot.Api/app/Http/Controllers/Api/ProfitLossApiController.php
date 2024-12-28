<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IProfitLossService;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Log;
class ProfitLossApiController extends Controller
{
    use ApiResponseTrait;
    protected $_profitLossService;

    public function __construct(IProfitLossService $profitLossService)
    {
        $this->_profitLossService = $profitLossService;
    }

    /**
     * Fetch profit and loss data from the JSON file.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfitLoss(Request $request)
    {

        try {

            $result = $this->_profitLossService->getProfitLossData($request->all());

            return $this->sendResponse(
                $result,
                "Profit Loss report fetched successfully.",
                200
            );
        } catch (\Exception $e) {
            Log::channel('api_log')->error('An error occurred in the custom log.'.$e->getMessage());
            return $this->sendError($e);
        }
    }
}
