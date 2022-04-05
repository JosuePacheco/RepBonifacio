<?php

namespace App\Http\Controllers\Line;

use App\Models\Line;
use App\Http\Requests\LineRequest;
use App\Http\Controllers\ApiController;

class LineController extends ApiController
{
    public function show(Line $line)
    {
        return $this->showOne($line);
    }

    public function update(LineRequest $request, Line $line)
    {
        $line->fill($request->all());
        if ($line->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }
        $line->save();
        return $this->showOne($line);
    }

    public function destroy(Line $line)
    {
        $line->delete();
        return $this->showOne($line);
    }

    
}
