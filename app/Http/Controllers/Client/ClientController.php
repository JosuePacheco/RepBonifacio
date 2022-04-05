<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends ApiController
{
    public function show(Client $client)
    {
        return $this->showOne($client);
    }

    public function update(Client $client, ClientRequest $request)
    {
        $client->fill($request->all());

        if ($client->isClean()) {
            return $this->errorResponse("At least one value must change", 422);
        }

        $client->save();

        return $this->showOne($client);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return $this->showOne($client);
    }
}
