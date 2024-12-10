<?php
namespace App\Services;

use App\Interfaces\IMenuService;

class MenuService implements IMenuService
{
    /**
     * Fetch the menu data from the JSON file.
     *
     * @return array
     */
    public function getMenuData(): array
    {
        // Path to the JSON file
        $path = storage_path('json/menu.json');

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
