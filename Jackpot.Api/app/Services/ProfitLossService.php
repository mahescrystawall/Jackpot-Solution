<?php
namespace App\Services;

use App\Interfaces\IProfitLossService;

class ProfitLossService implements IProfitLossService
{
    /**
     * Fetch the profit and loss data from the JSON file.
     *
     * @return array
     */
    public function getProfitLossData(): array
    {
        // Path to the profit and loss JSON file
        $path = storage_path('json/profit_loss.json');

        // Check if file exists
        if (file_exists($path)) {
            // Read the file content
            $json = file_get_contents($path);

            // Decode JSON to array
            return json_decode($json, true);
        }

        return ['message' => 'File not found'];
    }
}
