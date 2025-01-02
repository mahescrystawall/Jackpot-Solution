<?php

namespace App\Services;

use App\Interfaces\IUserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\UserRepository;
use App\Traits\HandleError;

class UserService implements IUserService
{
    protected $userRepository;

    use HandleError;

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

        $response = $this->userRepository->toggleUserStatus($request);
        if (!$response['success'])
            return $response['message'];
        //throw new \Exception($response['message']);
        Log::channel('api_log')->error('An error occurred in the custom log.' . $response['message']);
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
        try {
            DB::beginTransaction();

            $response = $this->userRepository->createClientUser($request);
            if (!$response['success']) {
                return HandleError::handle($response['message']);
            }

            $buttonsResponse = $this->createDefaultButtons($response['result']?->first()?->new_user_id);
            if (!$buttonsResponse['success']) {
                return HandleError::handle($response['message']);
            }

            $chipResponse = $this->createDefaultChip($response['result']?->first()?->new_user_id);
            if (!$chipResponse['success']) {
                return HandleError::handle($response['message']);
            }

            DB::commit();
            return $response['result'];
        } catch (\Throwable $e) {
            DB::rollBack();
            return HandleError::handle($e->getMessage());
        }
    }

    /**
     * Create default buttons
     */
    public function createDefaultButtons($userId)
    {

        $response = $this->userRepository->createDefaultButtons(["user_id" => $userId, "created_by" => 1]);
        if (!$response['success']) {

            Log::channel('error_logs')->error('An error occurred in creating default buttons: ' . $response['message']);
            return $response;
        }
        return $response;
    }

    /**
     * Create default chip
     */
    public function createDefaultChip($userId)
    {
        $response = $this->userRepository->createDefaultChip(["user_id" => $userId, "created_by" => 1]);
        if (!$response['success']) {
            Log::channel('error_logs')->error('An error occurred in creating default chip: ' . $response['message']);
            return $response;
        }
        return $response;
    }

    public function updateUserResetPassword(int $userId, string $newPassword, string $type)
    {
        $data = [
            'user_id' => $userId,
            'new_password' => $newPassword,
            'type' => $type
        ];

        $response = $this->userRepository->updateUserResetPassword($data);
        if (!$response['success']) {
            Log::channel('api_log')->error('An error occurred in the custom log.' . $response['message']);
            return $response['message'];
        }

        return $response['result'];
    }

    public function getBlockedClients($parentId)
    {
        $data = [
            'parent_id' => $parentId
        ];

        $response = $this->userRepository->getBlockedClients($data);
        if (!$response['success']) {
            Log::channel('api_log')->error('An error occurred in the custom log.' . $response['message']);
            return $response['message'];
        }

        return $response['result'];
    }
}
