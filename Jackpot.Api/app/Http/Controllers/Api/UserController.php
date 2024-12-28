<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToggleUserFeatureRequest;
use App\Interfaces\IUserService;
use App\Traits\ApiResponseTrait;
use App\Http\Requests\UpdateButtonValueRequest;
use Exception;
use Illuminate\Support\Facades\Log;
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
            Log::channel('api_log')->info('User toggle api called');
            $result = $this->_userService->changeUserStatus($request->all());

            return $this->sendResponse(
                $result,
                "User status toggled successfully.",
                200
            );
        } catch (Exception $e) {
            Log::channel('api_log')->error('An error occurred in the custom log.'.$e->getMessage());
            return $this->sendError($e);
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
}
