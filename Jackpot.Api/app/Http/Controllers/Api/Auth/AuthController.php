<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Interfaces\IAuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $_authService;

    public function __construct(IAuthService $_authService)
    {
        $this->_authService = $_authService;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $response = $this->_authService->login($data);

        // Return response directly
        return response()->json($response, 200);
    }

    public function logout(Request $request)
    {
        $response = $this->_authService->logout($request->user());
        return response()->json($response, 200);
    }
}
