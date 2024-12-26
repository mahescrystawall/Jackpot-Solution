<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToggleUserFeatureRequest;
use App\Interfaces\IUserService;
use App\Traits\ApiResponseTrait;
use App\Http\Requests\UpdateButtonValueRequest;

class UserController extends Controller
{
    use ApiResponseTrait;

    protected $_userService;

    public function __construct(IUserService $userService)
    {
        $this->_userService = $userService;
    }

    /**
     * Handle the toggle of user features (status, can_bet).
     */
    public function toggleUserFeature(ToggleUserFeatureRequest $request)
    {
        // The validation is already handled by the custom request

        $userId = $request->input('user_id');
        $featureType = $request->input('feature_type');

        $procedureName = $this->getProcedureNameForFeature($featureType);

        try {
            $result = $this->_userService->changeUserStatus($userId, $procedureName);

            return $this->sendResponse(
                $result,
                "User $featureType toggled successfully.",
                "Failed to toggle user $featureType."
            );
        } catch (\Throwable $th) {
            return $this->sendError($th);
        }
    }

     /**
     * Get the procedure name based on the feature type.
     */
    private function getProcedureNameForFeature(string $featureType): string
    {
        return match ($featureType) {
            'can_bet' => 'Toggle_User_Can_Bet',
            'status' => 'Toggle_User_Status',
        };
    }

     /**
     * Handle creating user button value.
     */
    public function updateButtonValue(UpdateButtonValueRequest $request)
    {
        // The validation is already handled by the custom request

        $Id = $request->input('id');
        $title = $request->input('title');
        $amount = $request->input('amount');
        $updated_at = now()->format('Y-m-d H:i:s.u');

        try {
            // Execute the procedure
            $result = $this->_userService->updateButtonValue($Id, $title, $amount, $updated_at);

            // Return response using the ApiResponseTrait
            return $this->sendResponse(
                $result,
                "User Button Value successfully created.",
                "Failed to create button value."
            );
        } catch (\Throwable $th) {
            return $this->sendError($th);
        }
    }
}
