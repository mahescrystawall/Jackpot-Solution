<?php

namespace App\Services;

use App\Interfaces\IUserService;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Log;

class UserService implements IUserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function changeUserStatus($data)
    {
        $response = $this->userRepository->toggleUserStatus($data);
        if (!$response['success']) {
            //throw new \Exception($response['message']);
            Log::channel('api_log')->error('An error occurred in the custom log.' . $response['message']);
            return $response['message'];
        }

        return $response['result'];
    }

    public function updateButtonValue($userId, $title, $amount, $updated_at)
    {
        $data = [
            "user_id" => $userId,
            "title" => $title,
            "amount" => $amount,
            "updated_at" => $updated_at,
            1
        ];
        $response = $this->userRepository->updateButtonValue($data);
        if (!$response['success']) throw new \Exception($response['message']);
        return $response['result'];
    }
}
