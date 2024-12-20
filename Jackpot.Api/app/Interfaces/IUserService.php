<?php

namespace App\Interfaces;

interface IUserService
{
    /**
     * Change the user status by calling the appropriate procedure.
     *
     * @param int $user_id The ID of the user.
     * @param string $procedure_name The name of the procedure to execute.
     * @return mixed The result of the procedure execution.
     */
    public function changeUserStatus(int $user_id, string $procedure_name);
}
