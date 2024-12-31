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
            'data' => $result,
            'message' => $successMessage,
        ], $code);
    }

    /**
     * Send an error response for exceptions.
     */
    public function sendError($th, $code = 500)
    {
        if ($th instanceof \Throwable) {
            // If $th is an exception (Throwable), return its message
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred.',
                'error' => $th->getMessage(),
            ], $code);
        }

        // If $th is an array (like validation errors), handle accordingly
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $th,
        ], 422);
    }
}
