<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IButtonService;

class ButtonController extends Controller
{
    protected $_buttonService;

    /**
     * Inject the IButtonService dependency into the controller.
     *
     * @param IButtonService $buttonService
     */
    public function __construct(IButtonService $buttonService)
    {
        $this->_buttonService = $buttonService;
    }

    /**
     * Fetch the casino games data and return it as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserButtons()
    {
        $UserId = $request->input('user_id');
        $data = $this->_buttonService->getUserButtons($UserId);

        if (isset($data['message']) && $data['message'] === 'Data not found') {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }
}
