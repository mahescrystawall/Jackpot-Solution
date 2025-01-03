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
    public function changeUserStatus(array $request);
    public function updateButtonValue(int $user_id, string $title, string $amount, $updated_at);

    public function getUsersByParentIdPaginated($parentId);


    /**
     * Create a client user.
     *
     * @param array $request The request data.
     * @return mixed The result of the procedure execution.
     */
    public function createClientUser(array $request);


    public function resetPassword(int $userId, string $newPassword, string $type);

    /**
     * Create default buttons
     */
    public function createDefaultButtons(int $user_id);

    public function getBlockedClients($parentId);
}
