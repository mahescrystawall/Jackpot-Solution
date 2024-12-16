<?php

namespace App\Interfaces;

interface IProfitLossService
{
    public function getProfitLossData(string $fileName, array $filters): array;
}
