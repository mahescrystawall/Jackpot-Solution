<?php

namespace App\Services;

use App\Interfaces\IEventService;

class EventService implements IEventService
{
    /**
     * Fetch the event data from the JSON file.
     *
     * @return array
     */
    public function getEventData(): array
    {
        $path = storage_path('json/events.json');

        if (file_exists($path)) {
            $json = file_get_contents($path);
            return json_decode($json, true);
        }

        return ['message' => 'File not found'];
    }
}
