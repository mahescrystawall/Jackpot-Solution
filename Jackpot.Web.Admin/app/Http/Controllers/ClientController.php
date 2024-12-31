<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    protected $clientService;
    
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function newClient()
    {
        return view('client.create');
    }
    public function addClient(Request $request)
    {

        $data = $request->all();

        
    }
}
