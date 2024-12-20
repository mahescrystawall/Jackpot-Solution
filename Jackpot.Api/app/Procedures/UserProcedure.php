<?php

namespace App\Procedures;

use App\Procedures\Procedure;

class UserProcedure {
    static public function getAll()
    {
        return Procedure::ExecuteProcedure('Get_All_Users');
    }

    static public function getClientsByParent()
    {
        return Procedure::ExecuteProcedure('Get_Users_By_Parent_Id_Paginated', [

        ]);
    }

    static public function create()
    {
        return Procedure::ExecuteProcedure('Create_User', [
            "admin",
            "admin",
            "admin@gmail.com",
            "password",
            "1111",
            "active",
            "active"
        ]);
    }
}
