<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\ApiController;
use App\Http\Requests\ClientRequest;
use App\Models\Branch;
use App\Models\Client;

class BranchClientController extends ApiController
{
    public function index(Branch $branch)
    {
        $clients = $branch->clients;
        return $this->showAll($clients);
    }

    public function store(ClientRequest $request, Branch $branch)
    {
        $client = Client::create([
            "name" => $request->name,
            "first_lastname" => $request->first_lastname,
            "second_lastname" => $request->second_lastname,
            "telephone_number" => $request->telephone_number,
            "credit" => $request->credit,
            "positive_balance" => $request->positive_balance,
            "branch_id" => $branch->id,
            "type" => $request->type,
        ]);

        return $this->showOne($client, 201);
    }
}
