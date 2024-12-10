<?php
namespace App\Interfaces;

interface IBetService
{
    public function getBetData(string $fileName): array;
}
