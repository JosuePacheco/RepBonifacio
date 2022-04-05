<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\ApiController;
use App\Http\Requests\ExpenseRequest;
use App\Models\Branch;
use App\Models\Expense;

class BranchExpenseController extends ApiController
{
    public function index(Branch $branch)
    {
        $expenses = $branch->expenses;

        return $this->showAll($expenses);
    }

    public function store(Branch $branch, ExpenseRequest $request)
    {
        $expense = Expense::create([
            "name" => $request->name,
            "description" => $request->description,
            "amount" => $request->amount,
            "branch_id" => $branch->id,
            "user_id" => auth()->user()->id,
        ]);

        return $this->showOne($expense, 201);
    }
}
