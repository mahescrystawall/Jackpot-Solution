<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SportsInplayService;

class SportsController extends Controller
{
    protected $sportsInplayService;

    public function __construct(SportsInplayService $sportsInplayService)
    {
        $this->sportsInplayService = $sportsInplayService;
    }



    /**
     * { "id": 4, "name": "Cricket" },
     * { "id": 1, "name": "Football" },
     * { "id": 2, "name": "Tennis" },
     * { "id": 99995, "name": "I Casino" },
     * { "id": 99999, "name": "Casino" },
     * { "id": 99998, "name": "Int Casino" },
     * { "id": 99991, "name": "Sports book" },
     * { "id": 7, "name": "Horse Racing" },
     * { "id": 4339, "name": "Greyhound Racing" },
     * { "id": 99990, "name": "Binary" },
     * { "id": 99994, "name": "Kabaddi" },
     * { "id": 2378961, "name": "Politics" },
     * { "id": 7522, "name": "Basketball" },
     * { "id": 7511, "name": "Baseball" },
     * { "id": 20, "name": "Table Tennis" },
     * { "id": 998917, "name": "Volleyball" },
     * { "id": 7524, "name": "Ice Hockey" },
     * { "id": 5, "name": "Rugby" },
     * { "id": 26420387, "name": "Mixed Martial Arts" },
     * { "id": 3503, "name": "Darts" },
     * { "id": 29, "name": "Futsal" },
     * { "id": 99997, "name": "Casino Vivo" }
     */

    public function index_inplay()
    {
        // Fetch data using the service
        $sportsData = $this->sportsInplayService->getInplayData();

        // $inplayGameList = [];

        // dd($sportsData);

        // Manually define the mapping of event_type_id to category names
        $eventTypeMapping = [
            4 => 'Cricket',
            1 => 'Football',
            2 => 'Tennis',
            99995 => 'I Casino',
            99999 => 'Casino',
            99998 => 'Int Casino',
            99991 => 'Sports book',
            7 => 'Horse Racing',
            4339 => 'Greyhound Racing',
            99990 => 'Binary',
            99994 => 'Kabaddi',
            2378961 => 'Politics',
            7522 => 'Basketball',
            7511 => 'Baseball',
            20 => 'Table Tennis',
            998917 => 'Volleyball',
            7524 => 'Ice Hockey',
            5 => 'Rugby',
            26420387 => 'Mixed Martial Arts',
            3503 => 'Darts',
            29 => 'Futsal',
            99997 => 'Casino Vivo',
        ];

        // Initialize a collection to store events by category
        $eventsByCategory = collect();

        // Loop through the events in the main_array
        foreach ($sportsData['data']['events'] as $event) {
            $eventTypeId = $event['event_type_id'];

            // Check if the event_type_id exists in the mapping
            if (isset($eventTypeMapping[$eventTypeId])) {
                // Format category name (e.g., "Football" -> "football")
                $categoryName = strtolower(str_replace(' ', '', $eventTypeMapping[$eventTypeId]));

                // Add the event to the category collection
                $eventsByCategory->put($categoryName, $eventsByCategory->get($categoryName, collect())->push((object) $event));
            }
        }

        dd($eventsByCategory);

        
        // dd($casinoGameList);
        // Pass the data to the view
        return view('int-casino.int-casino', compact('casinoData', 'casinoGameList'));
    }
}
