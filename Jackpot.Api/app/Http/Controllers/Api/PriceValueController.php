<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IPriceValueService;

class PriceValueController extends Controller
{
    protected $_priceValueService;

    public function __construct(IPriceValueService $priceValueService)
    {
        $this->_priceValueService = $priceValueService;
    }

    /**
     * Fetch the stakes data from a JSON file and return it as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStakes()
    {
        $data = $this->_priceValueService->getStakesData();

        if (isset($data['message']) && $data['message'] === 'File not found') {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }
}
