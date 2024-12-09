<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
   /**
     * Fetch event data from the JSON file.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEvents()
    {
        $path = storage_path('json/events.json');

        if (file_exists($path)) {
            $json = file_get_contents($path);
            $data = json_decode($json, true);
            return response()->json($data, 200);
        } else {
            return response()->json(['message' => 'File not found'], 404);
        }
    }
}
