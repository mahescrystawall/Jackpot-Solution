<?php

namespace App\Services\Auth;

use App\Interfaces\IAuthService;
use App\Models\User;
use App\Procedures\Procedure;
use Illuminate\Auth\AuthenticationException; // Use AuthenticationException
use Illuminate\Support\Facades\Hash;

class AuthService implements IAuthService
{
    public function login($data)
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
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
