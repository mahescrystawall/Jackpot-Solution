<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IProfitLossService;
use Illuminate\Http\Request;

class ProfitLossApiController extends Controller
{
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

        $filters = $request->all();

        $apiUrl = null;

        $data = $this->_profitLossService->getProfitLossData($apiUrl, $filters);


        if (isset($data['message']) && $data['message'] === 'File not found') {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }
}
