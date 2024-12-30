<?php

namespace App\Repositories;

use App\Procedures\Procedure;
use App\Constants\ProcedureNames;

class BetRepository
{

    static public function getUnsettledBet(array $data)
    {
        try {
            $data =  Procedure::ExecuteProcedure(ProcedureNames::GET_UNSETTLED_BETS, $data);

            return $data;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * create bet
     */
    static public function createBet(array $data)
    {
        try {
            $data =  Procedure::ExecuteProcedure(ProcedureNames::CREATE_BET, $data);

            return $data;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * settle bet
     */
    static public function settleBet(array $data)
    {
        try {
            $data =  Procedure::ExecuteProcedure(ProcedureNames::SETTLE_BET, $data);

            return $data;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
