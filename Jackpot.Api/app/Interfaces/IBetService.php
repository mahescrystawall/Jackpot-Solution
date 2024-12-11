<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface IBetService
{
    /**
     * Fetch bet data from the specified file.
     *
     * @param string $fileName
     * @return array
     */
    public function getBetData(string $fileName): array;

    /**
     * Fetch bet history data from the specified file with optional filters and date range.
     *
     * @param string $fileName
     * @param array $queryParams An associative array of query parameters for filtering.
     * @param \Carbon\Carbon|null $startDate The start date for filtering (optional).
     * @param \Carbon\Carbon|null $endDate The end date for filtering (optional).
     * @return array
     */
    public function getBetHistoryData(string $fileName, array $queryParams = [], Carbon $startDate = null, Carbon $endDate = null): array;
}
