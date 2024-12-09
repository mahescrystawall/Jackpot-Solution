<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use App\Traits\FileHelper;

class BetService
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
    public function getBetData(string $fileName)
    {
        return $this->getDataFromFile($fileName);
    }
}
