<?php

namespace App\Http\Controllers\Branch;

use App\Models\Branch;
use App\Http\Requests\BranchRequest;
use App\Http\Controllers\ApiController;

class BranchController extends ApiController
{
    public function show(Branch $branch)
    {
        return $this->showOne($branch);
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return $this->showOne($branch);
    }

    public function update(BranchRequest $request, Branch $branch)
    {
        $branch->fill($request->all());
        if ($branch->isClean()) {
            return $this->errorResponse(
                "Se necesita especificar un valor diferente para actualizar",
                422
            );
        }

        $branch->save();

        return $this->showOne($branch);
    }
}
