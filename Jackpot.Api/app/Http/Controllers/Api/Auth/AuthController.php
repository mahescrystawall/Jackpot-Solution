<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Interfaces\IAuthService;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;

class AuthController extends Controller
{
    use ApiResponseTrait;
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

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $data = $this->_authService->updatePassword($request->all());

        if (!$data['success']) {
            return $this->sendError(
                $data['message'],
                404  // You can adjust the status code as needed
            );
        }
        // For successful responses, return the data directly
        return $this->sendResponse($data, $data['message'], 200);
    }



    // public function login(LoginRequest $request)
    // {
    //     $data = $request->all();
    //     // return $data;

    //     $response = $this->_authService->login($data);

    //     // The first argument should be the response data, then the success message
    //     return $this->sendResponse($response, 200);
    // }

    // public function logout(Request $request)
    // {
    //     try {
    //         $response = $this->_authService->logout($request->user());

    //         return $this->sendResponse($response, 'Logout successful.');
    //     } catch (\Exception $th) {

    //         return $this->sendError($th);
    //     }
    // }
}
