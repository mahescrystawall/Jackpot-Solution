<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceValueController extends Controller
{
     /**
     * Fetch the stakes data from a JSON file and return it as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStakes()
    {
        // Path to the JSON file
        $path = storage_path('json/stakes.json');

        // Check if the file exists
        if (file_exists($path)) {
            // Read the contents of the file
            $json = file_get_contents($path);

            // Decode the JSON data to an array
            $data = json_decode($json, true);

            // Return the data as a JSON response
            return response()->json($data, 200);
        } else {
            // Return an error response if the file is not found
            return response()->json(['message' => 'File not found'], 404);
        }
    }
}
