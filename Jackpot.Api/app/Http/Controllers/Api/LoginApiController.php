<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ILoginService;

class LoginApiController extends Controller
{
    protected $_loginService;

    public function __construct(ILoginService $loginService)
    {
        $this->_loginService = $loginService;
    }

    /**
     * Fetch the login data from the JSON file and return it as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLoginData()
    {
        // Use the LoginService to get the login data
        $data = $this->_loginService->getLoginData('login.json');

        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }

        return response()->json($data, 200);
    }
}
