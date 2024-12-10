<?php
namespace App\Services;

use App\Interfaces\ILoginService;
use App\Traits\FileHelper;

class LoginService implements ILoginService
{
    use FileHelper;

    public function getLoginData(string $fileName): array
    {
        return $this->getDataFromFile($fileName);
    }
}



