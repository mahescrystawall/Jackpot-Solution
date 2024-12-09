<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LoginService;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

     /**
     * Fetch the unsettled bets from the JSON file and return them as a JSON response.
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLoginData()
    {
        // Use the LoginService to get the auth user
        $data = $this->loginService->getLoginData('login.json');

        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }
        return response()->json($data, 200);
    }
}
