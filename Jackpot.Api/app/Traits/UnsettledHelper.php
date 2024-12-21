<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Procedures\Procedure;

class UnsettledHelper extends User
{


    static public function unsettledBet($data)
    {
        try {
            $data = Procedure::ExecuteProcedure('Get_Unsettled_Bets', $data);

            return collect($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }










    static public function updatePassword($data)
    {
        try {
            $password = bcrypt($data['password']);
            $data = Procedure::ExecuteProcedure('Update_User_Password', [$data['user_id'], $password]);

            return collect($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
