<?php

namespace App\Interfaces;

interface IProfitLossService
{
    public function getProfitLossData(string $apiUrl=null,array $filters): array;
}
