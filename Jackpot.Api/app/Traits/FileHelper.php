<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

Trait FileHelper {
    public function getDataFromFile($fileName)
        {
            $path = storage_path('json/' . $fileName);
            if (file_exists($path)) {
                $json = file_get_contents($path);
                $data = json_decode($json, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    return ['message' => 'Invalid JSON data'];
                }
                return $data;
            } else {
                return ['error_message' => 'File not found'];
            }
        }
}
