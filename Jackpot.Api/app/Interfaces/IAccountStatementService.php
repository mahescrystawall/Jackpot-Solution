<?php

namespace App\Interfaces;

interface IAccountStatementService
{
    public function getAccountStatement(string $fileName, array $filters): array;  
        public function getBetList(string $fileName): array;

}