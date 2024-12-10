<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class LoginService
{
    public function getloginData()
    {
        $baseUrl = env('API_URL');
        
        $loginData = Http::timeout(60)->get($baseUrl.'/api/login-data');

        if ($loginData->successful()) {
            return $loginData->json(); // Return response as an array
        }
        return ['error' => 'Failed to fetch data'];
    }

}