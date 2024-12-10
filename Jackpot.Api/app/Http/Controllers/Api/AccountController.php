<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountStatementService;

class AccountController extends Controller
{
    protected $accountStatementService;

    // Inject StakeService into the controller
    public function __construct(AccountStatementService $accountStatementService)
    {
        $this->accountStatementService = $accountStatementService;
    }
    public function getLoginData()
    {
        // Use the LoginService to get the auth user
        $data = $this->accountStatementService->getAccountStatement($filters);

        if (isset($data['error_message'])) {
            return response()->json($data, 400);
        }
        return response()->json($data, 200);
    }
}
