<?php

namespace App\Services\Auth;

use App\Interfaces\IAuthService;
use App\Models\User;
use App\Procedures\Procedure;
use Illuminate\Auth\AuthenticationException; // Use AuthenticationException
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AuthService implements IAuthService
{
    public function login($data)
    {
        // Define the key and IV (they must match the frontend)
        $key = env('AES_KEY');  // 32-byte key (same as frontend)
        $iv = env('AES_IV');  // 16-byte IV (same as frontend)
        
        $key = 'hdgh6372dhbshdg637wyqb27t28syb2q';  // 32-byte key (same as frontend)
        $iv = '8g2wg2mnw01b6w7w';  // 16-byte IV (same as frontend)

        // Get the encrypted password from the request
        $encryptedPassword = $data['password'];

        // Decrypt the password using AES-256-CBC
        $decryptedPassword = openssl_decrypt(
            base64_decode($encryptedPassword),  // Decode the base64 encoded password
            'AES-256-CBC',
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );

        // dd($decryptedPassword);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($decryptedPassword, $user->password)) {
            throw new AuthenticationException('The provided credentials are incorrect.');
        }

        $chips = Procedure::ExecuteProcedure('Get_Chip_By_User_Id', ["user_id" => $user->id]);
        // Create a token with expiration time
        $token = $user->createToken('authToken', ['*'], now()->addMinutes(20))->plainTextToken;

        return [
            'token' => $token,
            'chips' => $chips,
            'user' => [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
                'role_id' => $user->role_id,
            ],
        ];
    }

    public function logout($user)
    {
        $user->currentAccessToken()->delete();
        return ['message' => 'Logged Out Successfully'];
    }
}
