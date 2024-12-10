<?php
namespace App\Interfaces;

interface ILoginService
{
    public function getLoginData(string $fileName): array;
}
