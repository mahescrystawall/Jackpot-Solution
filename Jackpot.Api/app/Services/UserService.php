<?php

namespace App\Services;

use App\Interfaces\IUserService;
use App\Procedures\Procedure;

class UserService implements IUserService
{
    public function changeUserStatus($userId, $procedureName)
    {
        return  Procedure::ExecuteProcedure($procedureName, ["user_id"=>$userId]);
    }
}
