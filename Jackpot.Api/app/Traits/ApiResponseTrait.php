<?php

namespace App\Traits;

trait ApiResponseTrait
{
    /**
     * Send a success or error response based on the result.
     */
    public function sendResponse($result, string $successMessage, string $errorMessage)
    {
        if ($result) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => $errorMessage,
        ], 500);
    }

    /**
     * Send an error response for exceptions.
     */
    public function sendError(\Throwable $th)
    {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred.',
            'error' => $th->getMessage(),
        ], 500);
    }
}
