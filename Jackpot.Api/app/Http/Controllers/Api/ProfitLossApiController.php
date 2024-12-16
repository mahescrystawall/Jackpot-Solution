<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\IProfitLossService;

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
        $filters = [
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ];
        $fileName= 'profit_loss.json';
        $data = $this->_profitLossService->getProfitLossData($fileName,$filters);

        if (isset($data['message']) && $data['message'] === 'File not found') {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }
}
