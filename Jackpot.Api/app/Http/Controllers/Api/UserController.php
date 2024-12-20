<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\IUserService;
class UserController extends Controller
{

    protected $_userService;

    /**
     * Inject the IUserService dependency into the controller.
     *
     * @param IUserService $userService
     */
    public function __construct(IUserService $userService)
    {
        $this->_userService = $userService;
    }


    // Method to handle updating user status
    public function toggleUserFeature(Request $request)
    {
        // Validate input parameters
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'feature_type' => 'required|string|in:can_bet,status'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        $userId = $request->input('user_id');
        $featureType = $request->input('feature_type');

        $procedureName = match ($featureType) {
            'can_bet' => 'Toggle_User_Can_Bet',
            'status' => 'Toggle_User_Status',
        };

        // Execute the procedure
        $result = $this->_userService->changeUserStatus($userId, $procedureName);


        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "User $featureType toggled successfully."
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Failed to toggle user $featureType."
            ], 500);
        }
    }
}

