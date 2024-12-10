<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IMenuService;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(IMenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Fetch menu data from the JSON file.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenu()
    {
        $data = $this->menuService->getMenuData();

        if (isset($data['message']) && $data['message'] === 'File not found') {
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }
}
