<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\LoginService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $loginservice;

    public function __construct(LoginService $loginservice)
    {
        $this->loginservice = $loginservice;
    }

    public function getLoginData(Request $request)
    {
        // Fetch login data from the service
        $response = $this->loginservice->getLoginData($request->all());


        // Check if token and user exist in the response
        if (isset($response['token'], $response['user'])) {
            // Store the token in the session or a secure storage
            session([
                'auth_token' => $response['token'],
                'balance' => $response['balance'],
                'exposure' => $response['exposure'],
                'user_name' => $response['user_name'],
                'user_id' => $response['user_id'],
                'role_id' => $response['role_id'],
            ]);



            // dd($response['user']);
            // Login the user using the ID from the response
            // Auth::loginUsingId($response['user']['id']);

            // dd(Auth::user());
            // Redirect to the home page or desired location
            return redirect('/home')->with('success', 'Login successful!');
        }

        // Handle error cases if token or user is missing
        return back()->withErrors([
            'error' => $response['message'] ?? 'Invalid credentials or API error.',
        ]);
    }

    public function logout()
    {

        session()->flush();
        return redirect('/login');
    }
}
