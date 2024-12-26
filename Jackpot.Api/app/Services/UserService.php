<?php

namespace App\Services;

use App\Interfaces\IUserService;
use App\Procedures\Procedure;
use App\Constants\ProcedureNames;

class UserService implements IUserService
{
    public function changeUserStatus($request)
    {
        $response = Procedure::ExecuteProcedure(ProcedureNames::TOGGLE_USER_STATUS, $request);
        if(!$response['success'])  throw new \Exception($response['message']);
        return $response['result'];
    }

    public function updateButtonValue($userId, $title,$amount,$updated_at)
    {
        $response = Procedure::ExecuteProcedure(
            ProcedureNames::UPDATE_BUTTON,
            ["user_id" => $userId, "title" => $title, "amount" => $amount, 'updated_at' => $updated_at, 1]
        );
        if(!$response['success'])  throw new \Exception($response['message']);
        return $response['result'];
    }

}
