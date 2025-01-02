<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClientUserRequest;
use App\Http\Requests\ToggleUserFeatureRequest;
use App\Http\Requests\UpdateButtonValueRequest;

use App\Interfaces\IUserService;
use App\Traits\ApiResponseTrait;


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
    public function UpdateUserStaus(ToggleUserFeatureRequest $request)
    {

        try {
            Log::channel('error_logs')->info('User toggle api called');
            $result = $this->_userService->changeUserStatus($request->all());

            return $this->sendResponse(
                $result,
                "User status toggled successfully.",
                200
            );
        } catch (\Throwable $th) {
            Log::channel('error_logs')->error('An error occurred in the custom log.' . $th);
            return $this->sendError($th);
        }
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

    /**
     * Get the list of clients by parent ID with pagination.
     */
    public function getClientList(Request $request)
    {
        $parentId = $request->input('user_id');


        try {
            $result = $this->_userService->getUsersByParentIdPaginated($parentId);

            return $this->sendResponse(
                $result,
                "Client list retrieved successfully.",
                200
            );
        } catch (\Throwable $th) {
            Log::channel('error_logs')->error('An error occurred while retrieving client list: ' . $th);
            return $this->sendError($th);
        }
    }
     /**
     * Create client user.
     */
    public function createClientUser(CreateClientUserRequest $request)
    {
        // The validation is already handled by the custom request

        $data = $request->except('password_confirmation');
        $data['role_id'] = 3;
        $data['parent_id'] = 1; // static for now;
        $data['is_blocked'] = 0;
        $data['is_locked'] = 0;
        $data['remember_token'] = null;
        $data['created_by'] = 1; // static for now;

        // Hash the password before saving
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        if (isset($data['withdrawal_password'])) {
            $data['withdrawal_password'] = bcrypt($data['withdrawal_password']);
        }

        // return $data;

        // try {
        // Execute the procedure
        $result = $this->_userService->createClientUser($data);

        // Return response using the ApiResponseTrait
        return $this->sendResponse(
            $result,
            "Client User successfully created.",
            200
        );
        // } catch (\Throwable $th) {
        //     return $this->sendError($th);
        // }

    }

    /**
     * Update user password.
     */
    public function updateUserResetPassword(Request $request)
    {
        $userId = $request->input('user_id');
        $newPassword = bcrypt($request->input('new_password'));
        $type = $request->input('type');

        try {
            $result = $this->_userService->updateUserResetPassword($userId, $newPassword, $type);

            return $this->sendResponse(
                $result,
                "User password updated successfully.",
                200
            );
        } catch (\Throwable $th) {
            Log::channel('error_logs')->error('An error occurred while updating user password: ' . $th);
            return $this->sendError($th);
        }
    }
}
