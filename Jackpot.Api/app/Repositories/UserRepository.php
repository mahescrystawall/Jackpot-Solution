<?php

namespace App\Repositories;

use App\Models\User;
use App\Procedures\Procedure;
use App\Constants\ProcedureNames;

class UserRepository
{
    public function toggleUserStatus(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::TOGGLE_USER_STATUS, $data);
    }

    public function updateButtonValue(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::UPDATE_BUTTON, $data);
    }
    public function getProfitLossReport(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::GET_PROFIT_LOSS, $data);
    }
    public function getAccountStatement(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::GET_ACCOUNT_STATEMENT, $data);
    }
    public function getUsersByParentIdPaginated(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::GET_USERS_BY_PARENT_ID_PAGINATED, $data);
    }
    public function getPassword(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::GET_PASSWORD, $data)['result']
            ->first()
            ->password;
    }

    public function updatePassword(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::UPDATE_PASSWORD, $data);
    }

    public function createClientUser(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::CREATE_USER, $data);
    }

    /**
     * Create default buttons
     */
    public function createDefaultButtons(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::CREATE_DEFAULT_BUTTONS, $data);
    }

    /**
     * Create chips
     */
    public function createDefaultChip(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::CREATE_DEFAULT_CHIPS, $data);
    }

    /**
     * Get Chips
     */
    public function getChips(array $data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::GET_CHIP_BY_USER_ID, $data);
    }

    /**
     * Get User by Email
     */
    public function getUserByEmail(string $email)
    {
        return User::where('email', $email)->first() ?? null;
    }
    
    public function getAllEventsTypes()
    {
        return Procedure::ExecuteProcedure(ProcedureNames::GET_ALL_EVENT_TYPES);
    }
}
