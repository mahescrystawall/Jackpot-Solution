<?php

namespace App\Services;

use App\Interfaces\IUserService;
use App\Procedures\Procedure;

class UserService implements IUserService
{
    public function changeUserStatus($userId, $procedureName)
    {
        $response =  Procedure::ExecuteProcedure($procedureName, ["user_id"=>$userId]);
        if(!$response['success'])  throw new \Exception($response['message']);
        return $response['result'];
    }

    public function updateButtonValue($userId, $title,$amount,$updated_at)
    {
        $response = Procedure::ExecuteProcedure('Update_Button', ["user_id"=>$userId,"title"=>$title,"amount"=>$amount,'updated_at'=>$updated_at,1]);
        if(!$response['success'])  throw new \Exception($response['message']);
        return $response['result'];
    }

}
