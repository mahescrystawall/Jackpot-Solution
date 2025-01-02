<?php

namespace App\Services;

use App\Constants\ProcedureNames;
use App\Interfaces\IButtonService;
use App\Procedures\Procedure;
use App\Repositories\UserRepository;

class ButtonService implements IButtonService
{

    public function __construct(private UserRepository $userRepository)
    {
    }
    public function getUserButtons($userId)
    {
        $response =  Procedure::ExecuteProcedure('Get_Buttons_By_User_Id', ["user_id" => $userId]);
        if (!$response['success'])  throw new \Exception($response['message']);
        return $response['result'];
    }

    /**
     * Create default buttons
     */
    public function createDefaultButtons($userId)
    {
        $response =$this->userRepository->createDefaultButtons(["user_id" => $userId]);
        if (!$response['success'])  throw new \Exception($response['message']);
        return $response['result'];
    }
}
