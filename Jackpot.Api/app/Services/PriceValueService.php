<?php
namespace App\Services;

use App\Interfaces\IPriceValueService;

class PriceValueService implements IPriceValueService
{
    /**
     * Fetch the stakes data from the JSON file.
     *
     * @return array
     */
    public function getStakesData(): array
    {
        // Path to the JSON file
        $path = storage_path('json/stakes.json');

        // Check if the file exists
        if (file_exists($path)) {
            // Read the contents of the file
            $json = file_get_contents($path);

            // Decode the JSON data to an array
            return json_decode($json, true);
        }

        return ['message' => 'File not found'];
    }
}
