<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IEventService;

class EventController extends Controller
{
    protected $_eventService;

    public function __construct(IEventService $eventService)
    {
        $this->_eventService = $eventService;
    }

    /**
     * Fetch event data from the JSON file.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEvents()
    {
        $data = $this->_eventService->getEventData();

        if (isset($data['message']) && $data['message'] === 'File not found') {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }
}
