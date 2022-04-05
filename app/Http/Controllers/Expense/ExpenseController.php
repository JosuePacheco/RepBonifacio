<?php

namespace App\Http\Controllers\Expense;

use App\Models\Expense;
use App\Http\Requests\ExpenseRequest;
use App\Http\Controllers\ApiController;

class ExpenseController extends ApiController
{
    public function show(Expense $expense)
    {
        return $this->showOne($expense);
    }

    public function update(Expense $expense, ExpenseRequest $request)
    {
        $expense->fill($request->all());

        if ($expense->isClean()) {
            return $this->errorResponse(
                "Debe especificar al menos un valor diferente para actualizar",
                422
            );
        }

        $expense->save();

        return $this->show($expense);
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return $this->showOne($expense);
    }
}
