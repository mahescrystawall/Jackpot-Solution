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



            return redirect('/home')->with('success', 'Login successful!');
        }

        // Handle error cases if token or user is missing
        return back()->withErrors([
            'error' => $response['message'] ?? 'Invalid credentials or API error.',
        ]);
    }

    public function logout()
    {
        $response = $this->loginservice->logout();
        // dd($response);
        if (!$response['success']) {
            return redirect('/home')->with('error', $response['message']);
        }

        session()->flush();


        return redirect('/login')->with('success', $response['message']);
    }


    public function changePassword()
    {
        return view('user.password.change_password');
    }

    public function updatePassword(Request $request)
    {
        $response = $this->loginservice->updatePassword($request->all());
        // Check for a failed response
        if (!$response['success']) {
            return redirect()->back()
                ->withErrors($response['errors'])
                ->with('error', $response['message'] ?? 'Invalid Credentials.');
        }

        // Successful response
        return redirect()->back()
            ->with('success', $response['message'] ?? 'Password updated successfully.');
    }
}
