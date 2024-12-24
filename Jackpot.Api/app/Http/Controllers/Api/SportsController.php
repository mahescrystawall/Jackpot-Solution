<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ISportsInplayService;


class SportsController extends Controller
{
    protected $_sportsInplayService;

    public function __construct(ISportsInplayService $sportInplayService)
    {
        $this->_sportsInplayService = $sportInplayService;
    }

    /**
     * Fetch the casino games data and return it as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getInplayGames()
    {
        // return response()->json(['test' => 'API is working']);
        
        $data = $this->_sportsInplayService->getInplayGamesData();

        if (isset($data['message']) && $data['message'] === 'Data not found') {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }
}
