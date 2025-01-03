<?php

namespace App\Services;

use App\Interfaces\IMenuService;
use App\Repositories\UserRepository;

class MenuService implements IMenuService
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Fetch the menu data from the JSON file.
     *
     * @return array
     */
    public function getAllEventsTypes()
    {
        $eventTypes = $this->userRepository->getAllEventsTypes();
        if (!$eventTypes['success']) throw new \Exception($eventTypes['message']);
        return collect($eventTypes);
    }
}
