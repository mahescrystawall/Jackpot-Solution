<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

Trait FileHelper {
    public function getDataFromFile(string $fileName): array
    {
        $path = storage_path('json/' . $fileName);

        if (!Storage::exists($path)) {
            return ['error_message' => 'File not found'];
        }

        // Read file contents using Storage facade
        $json = Storage::get($path);

        // Decode JSON and handle potential errors
        $data = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['error_message' => 'Invalid JSON data'];
        }

        return $data;
    }
}
