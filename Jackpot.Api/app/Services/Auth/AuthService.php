<?php

namespace App\Services\Auth;

use App\Interfaces\IAuthService;
use App\Models\User;
use App\Procedures\Procedure;
use App\Procedures\UserProcedure;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Auth\AuthenticationException; // Use AuthenticationException
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService implements IAuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function login($data)
    {
        $key = env("key");
        $iv = env("iv");
        // dd($data, $key, $iv);
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
        $token = $user->createToken('authToken', ['*'], now()->addMinutes(120))->plainTextToken;

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

    public function updatePassword($data)
    {
        try {
            $getData = [
                'user_id' => $data['user_id'],
                'type' => 'password'
            ];

            $updateData = [
                'user_id' => $data['user_id'],
                'new_password' => Hash::make($data['password']),
                'type' => 'password'
            ];

            $oldPassword = $this->userRepository->getPassword($getData);

            if (!$oldPassword) {
                throw new Exception("User not found");
            }

            if (!Hash::check($data['old_password'], $oldPassword)) {
                // Handle incorrect old password error
                return [
                    'success' => false,
                    'message' => "Old password doesn't match",
                ];
            }

            $this->userRepository->updatePassword($updateData);

            return [
                'success' => true,
                'message' => 'Password updated successfully',
            ];
        } catch (\Throwable $th) {
            // Catch any unforeseen errors
            return [
                'success' => false,
                'message' => 'An unexpected error occurred',
                'errors' => $th->getMessage(),
            ];
        }
    }
}
