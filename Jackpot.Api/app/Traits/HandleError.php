<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait HandleError
{
    static public function handleError($message, \Throwable $e = null)
    {
        $backtrace = debug_backtrace();
        $caller = $backtrace[1];
        $file = isset($caller['file']) ? $caller['file'] : 'unknown file';
        $line = isset($caller['line']) ? $caller['line'] : 'unknown line';

        Log::channel(env('LOG_CHANNEL'))
            ->error($message . ($e ? ' Exception: ' . $e->getMessage() : '') . " in $file on line $line");

        return $message;
    }
}
