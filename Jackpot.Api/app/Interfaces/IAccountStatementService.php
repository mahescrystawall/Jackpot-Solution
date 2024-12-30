<?php

namespace App\Interfaces;

interface IAccountStatementService
{
    public function getAccountStatement(array $filters);

    //  public function getBetList(string $fileName): array;

}
