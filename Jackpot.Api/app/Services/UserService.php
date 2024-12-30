<?php

namespace App\Services;

use App\Interfaces\IUserService;
use App\Repositories\UserRepository;


class UserService implements IUserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function changeUserStatus($request)
    {
        $response = $this->userRepository->toggleUserStatus($request);
        if (!$response['success']) throw new \Exception($response['message']);
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
