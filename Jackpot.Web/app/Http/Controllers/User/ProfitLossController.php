<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfitLossController extends Controller
{
    //
    public function index()
    {
        return view('user.profit_loss.profit_loss');
    }
}
