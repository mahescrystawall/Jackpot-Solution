<?php

namespace App\Interfaces;

interface IAccountStatementService
{
    public function getAccountStatement(string $fileName, array $filters): array;
    public function getCasinoData(string $casinoBetId): array; 
    public function getOrderData(array $requestData): array; 
    public function getBetList(string $fileName): array;
}
