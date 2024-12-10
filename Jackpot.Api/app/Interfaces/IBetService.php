<?php
namespace App\Interfaces;

interface IBetService
{
    public function getBetData(string $fileName): array;
    /**
     * Fetch bet data from the specified file.
     *
     * @param string $fileName
     * @param int|null $eventTypeId
     * @return array
     */
    public function getBetHistoryData(string $fileName, $eventTypeId = null): array;
}
