<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddClientRequest;
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
    public function addClient(AddClientRequest $request)
    {

        try {
  // Handle the valid data here, for example:
        $validated = $request->validated();
        // dd($request->all());

        $response = $this->clientService->createClient($validated);
            // Return a success response for AJAX
            return response()->json(['message' => 'Client created successfully'], 200);
        } catch (\Exception $e) {
            // Handle error response
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
        }

      
    }

    public function clientLists()
    {
        $adminId = ['user_id'=>1];
        $clients = $this->clientService->getClientLists($adminId);
        return view('client.list',compact('clients'));
    }
}
