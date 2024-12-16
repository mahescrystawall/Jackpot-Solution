<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntCasinoController extends Controller
{

    public function index()
    {
        return view('int-casino.casino');
    }
}
