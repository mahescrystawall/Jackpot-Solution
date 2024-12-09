<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use App\Traits\FileHelper;

class LoginService
{

    use FileHelper;

    /**
     * Fetch the data from the given JSON file.
     *
     * @param string $fileName
     * @return array
     */
    /**
     * Fetch the data from the given JSON file.
     *
     * @param string $fileName
     * @return array
     */
    public function getLoginData(string $fileName)
    {
        return $this->getDataFromFile($fileName);
    }
}
