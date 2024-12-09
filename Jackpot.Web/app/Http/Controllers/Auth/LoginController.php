<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\LoginService;
class LoginController extends Controller
{
    //
    protected $loginservice;
    public function __construct(LoginService $loginservice)
    {
        $this->loginservice = $loginservice;
    }
    public function showLoginForm()
    {
        // If the user is already logged in, redirect to the home page
        if (session()->has('access_token')) {
            return redirect('/home');
        }
        return view('auth.login');
    }
    public function getLoginData(Request $request)
    {
       
        // Fetch login data by calling the service method
        $response1 = $this->loginservice->getloginData();
    
        // Validate login credentials (use a more secure validation method in production)
        if ($request->username === 'Amrutha' && $request->password === 'Amr@2024') {

            session([
                        'user_data' => $response1['data']['user'],
                        'access_token' => $response1['data']['access_token'],
                        'games_list' =>$response1['data']['event_type_settings'],
                        'stakes'=>$response1['data']['stakes'],
                        'message'=>$response1['data']['message']
                    ]);

                    return redirect('/home');

        }
        else{
            return back()->withErrors([
                        'error' => $response['message'] ?? 'Invalid Credentials or API Error.',
                    ]);
        }
    }
    public function logout()
    {

       // $response = Http::withToken(session('access_token') ?? '')->get('https://api.d99hub.com/api/logout');
       // Destroy all session data
       session()->flush();
       return redirect('/login');

    }
}
?>