<?php
namespace App\Services;

use App\Interfaces\IBetService;
use App\Traits\FileHelper;

class BetService implements IBetService
{
    use FileHelper;

    public function getBetData(string $fileName): array
    {
        return $this->getDataFromFile($fileName);
    }
}
