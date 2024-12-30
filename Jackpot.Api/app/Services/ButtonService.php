<?php
namespace App\Services;

use App\Interfaces\IButtonService;
use App\Procedures\Procedure;
class ButtonService implements IButtonService
{
    public function getUserButtons($userId)
    {
        $response =  Procedure::ExecuteProcedure('Get_Buttons_By_User_Id', ["user_id"=>$userId]);
        if(!$response['success'])  throw new \Exception($response['message']);
        return $response['result'];
    }
}


