<?php

namespace App\Services;

use App\Interfaces\IUserService;
use Illuminate\Support\Facades\Log;
use App\Repositories\UserRepository;

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


    public function getUsersByParentIdPaginated($parentId)
    {
        $data = [
            'parent_id' => $parentId
        ];

        $response = $this->userRepository->getUsersByParentIdPaginated($data);
        if (!$response['success']) {
            Log::channel('api_log')->error('An error occurred in the custom log.' . $response['message']);
            return $response['message'];
        }

        return $response['result'];
    }
    /**
     * Create client user
     */
    public function createClientUser($request)
    {
        $response = $this->userRepository->createClientUser($request);
        if (!$response['success']) {
            Log::channel('error_logs')->error('An error occurred in user create.' . $response['message']);
            return $response['message'];
        }
        return $response['result'];
    }
}
