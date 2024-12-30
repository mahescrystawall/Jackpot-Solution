<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class LoginService
{

    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_URL');
    }
    public function getLoginData(array $data)
    {

        $url = $this->baseUrl . '/api/login';
        // dd($data['password']);
        // $password = decrypt($data['password'], 'Test@123');

        try {
            $response = Http::post($url, $data);

            // Check if the response is successful
            if ($response->successful()) {
                $loginData = $response->json();

                // Extract and format required data
                $balance = $loginData['chips']['result'][0]['balance'] ?? null;
                $exposure = $loginData['chips']['result'][0]['exposure'] ?? null;
                $userName = $loginData['user']['name'] ?? '';
                $userId = $loginData['user']['id'] ?? null;
                $roleId = $loginData['user']['role_id'] ?? null;

                // Return structured data
                return [
                    'token' => $loginData['token'] ?? null,
                    'balance' => $balance,
                    'exposure' => $exposure,
                    'user' => $loginData['user'] ?? null,
                    'user_name' => $userName,
                    'user_id' => $userId,
                    'role_id' => $roleId,
                ];
            }

            // Handle unsuccessful response
            return ['error' => 'Failed to fetch data', 'status' => $response->status()];
        } catch (\Exception $e) {
            // Handle exceptions, such as connection issues
            return ['error' => 'Exception occurred', 'message' => $e->getMessage()];
        }
    }
}
