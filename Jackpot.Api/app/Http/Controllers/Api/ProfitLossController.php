<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfitLossController extends Controller
{
   /**
     * Fetch profit and loss data from the JSON file.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfitLoss()
    {
        // Path to the profit and loss JSON file
        $path = storage_path('json/profit_loss.json');

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
