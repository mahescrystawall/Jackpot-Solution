<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AccountStatementController extends Controller
{
    //
    public function index()
    {
        return view('user.accounts.account_statement');
    }
}
