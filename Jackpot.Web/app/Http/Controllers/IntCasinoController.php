<?php

namespace App\Http\Controllers;

use App\Services\IntCasinoService;

class IntCasinoController extends Controller
{
    protected $intCasinoService;

    public function __construct(IntCasinoService $intCasinoService)
    {
        $this->intCasinoService = $intCasinoService;
    }

    public function index()
    {
        // Fetch data using the service
        $casinoData = $this->intCasinoService->getCasinoData();

        $casinoGameList = [];

        // Transform the data into the desired structure
        foreach ($casinoData['data']['int'] as $mainCategory => $subCategories) {
            $casinoGameList[$mainCategory] = [];

            foreach ($subCategories as $subCategoryName => $games) {
                $gameData = [];

                foreach ($games as $game) {
                    $gameData[] = [
                        'name' => $game['name'] ?? null,
                        'url_thumb' => $game['url_thumb'] ?? null,
                    ];
                }

                $casinoGameList[$mainCategory][] = [
                    'name' => $subCategoryName,
                    'data' => $gameData,
                ];
            }
        }
// dd($casinoGameList);
        // Fetch casino game list
        $casinogameList = $this->intCasinoService->getCasinoList($casinoData);

        // Pass the data to the view
        return view('int-casino.int-casino', compact('casinoData', 'casinoGameList'));
    }
}
