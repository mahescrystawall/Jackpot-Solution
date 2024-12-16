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

        // Pass the data to the view
        return view('int-casino.int-casino', compact('casinoData'));
    }
}
