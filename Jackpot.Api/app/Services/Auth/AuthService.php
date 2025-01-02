<?php

namespace App\Services\Auth;

use App\Interfaces\IAuthService;
use App\Models\User;
use App\Procedures\Procedure;
use App\Repositories\UserRepository;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Auth\AuthenticationException; // Use AuthenticationException
use Illuminate\Support\Facades\Hash;
use App\Traits\EncryptionTrait;


class AuthService implements IAuthService
{
    use EncryptionTrait, ApiResponseTrait;

    public function __construct(protected UserRepository $userRepository) {}

    /**
     * Handle user login.
     *
     * @param array $data The login data, typically including username and password.
     * @return mixed The result of the login process, usually a token or user information.
     */
    public function login($data)
    {
        $decryptedPassword = $this->decryptPassword($data['password']);

        $user = $this->userRepository->getUserByEmail($data['email']);

        if (!$user || !Hash::check($decryptedPassword, $user->password)) {
            return $this->sendError('wrong credentials', 401);
        }

        $chips = $this->userRepository->getChips(['user_id' => $user->id]);
        $token = $user->createToken(
            'authToken',
            ['*'],
            now()->addMinutes((int) env('TOKEN_EXPIRY', 120))
        )->plainTextToken;

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
