<?php

namespace App\Traits;

trait ApiResponseTrait
{
    /**
     * Send a success or error response based on the result.
     */
    public function sendResponse($result, string $successMessage, $code = 200)
    {
        return response()->json([
            'success' => true,
            'result' => $result,
            'message' => $successMessage,
        ], $code);
    }

    /**
     * Send an error response for exceptions.
     */
    public function sendError($th, $code = 500)
    {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred.',
            'error' => $th->getMessage(),
        ], $code);
    }
}
