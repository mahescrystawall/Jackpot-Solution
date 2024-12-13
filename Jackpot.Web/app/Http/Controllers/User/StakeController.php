<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\StakeService;
use Illuminate\Http\Request;

class StakeController extends Controller
{
    protected $stakeService;

    public function __construct(StakeService $stakeService)
    {
        $this->stakeService = $stakeService;
    }

    public function showForm(Request $request)
    {
        // Use the service to call the API and fetch stakes data
        $stakes = $this->stakeService->getStakesData();
        return view('user.stake_update', compact('stakes'));
    }

    public function updateStakeValue(Request $request)
    {

        dd($request);
        $stakeData = $request->only(['stake_name', 'stake_amount']);
        $response = $this->stakeService->updateStakeData($stakeData);

        if ($response['success']) {
            return back()->with('success', 'Stakes updated successfully!');
        }

        return back()->with('error', 'Failed to update stakes.');
    }
}
