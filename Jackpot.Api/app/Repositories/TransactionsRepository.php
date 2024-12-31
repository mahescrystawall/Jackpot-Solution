<?php

namespace App\Repositories;

use App\Procedures\Procedure;
use App\Constants\ProcedureNames;

class TransactionsRepository
{
    public function processTranster($data)
    {
        return Procedure::ExecuteProcedure(ProcedureNames::BALANCE_TRANSFER, $data);
    }

}
