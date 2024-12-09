<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Fetch menu data from the JSON file.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenu()
    {
        // Path to the JSON file
        $path = storage_path('json/menu.json');

        // Check if file exists
        if (file_exists($path)) {
            // Read the file content
            $json = file_get_contents($path);

            // Decode JSON to array
            $data = json_decode($json, true);

            // Return JSON response
            return response()->json($data, 200);
        } else {
            // Return error if file not found
            return response()->json(['message' => 'File not found'], 404);
        }
    }
}
