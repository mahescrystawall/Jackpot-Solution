<?php

namespace App\Http\Controllers;

use App\Services\CasinoService;

class CasinoController extends Controller
{
    protected $CasinoService;

    public function __construct(CasinoService $CasinoService)
    {
        $this->CasinoService = $CasinoService;
    }

    public function index()
    {
        // Fetch data using the service
        $casinoData = $this->CasinoService->getCasinoData();

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

        // Fetch casino game list

        $casinoGameList = array_intersect_key($casinoGameList, array_flip(['MAC88', 'Fun Games', 'Mac88 Virtuals', 'Color Prediction']));

        // Pass the data to the view
        return view('casino.casino', compact('casinoData', 'casinoGameList'));
    }
}
