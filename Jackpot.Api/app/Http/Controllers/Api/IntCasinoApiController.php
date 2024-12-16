<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IIntCasinoService;

class IntCasinoApiController extends Controller
{
    protected $_intCasinoService;

    /**
     * Inject the IIntCasinoService dependency into the controller.
     *
     * @param IIntCasinoService $intCasinoService
     */
    public function __construct(IIntCasinoService $intCasinoService)
    {
        $this->_intCasinoService = $intCasinoService;
    }

    /**
     * Fetch the casino games data and return it as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCasinoGames()
    {
        $data = $this->_intCasinoService->getCasinoGamesData();

        if (isset($data['message']) && $data['message'] === 'Data not found') {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }
}
