<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IBalanceTransferService;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;

class BalanceTransferController extends Controller
{
    use ApiResponseTrait;
    public function __construct(protected IBalanceTransferService $balanceTransferService)
    {
    }

    public function processTransfer(Request $request)
    {
        try {
            $data = $this->balanceTransferService->transfer($request->all());
            return $this->sendResponse($data, 'success', 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 500);
        }
    }
}
