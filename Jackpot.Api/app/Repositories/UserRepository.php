<?php
namespace App\Repositories;
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

    public function getUsersByParentIdPaginated(array $data,$page   = 1, $perPage = 15)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::GET_USERS_BY_PARENT_ID_PAGINATED, $data, $page, $perPage);
    }


}
