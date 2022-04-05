<?php

namespace App\Http\Controllers\Branch;

use App\Models\Branch;
use App\Http\Controllers\ApiController;

class BranchProductController extends ApiController
{
    public function __invoke(Branch $branch)
    {
        $products = $branch
            ->products()
            ->whereStatusId(2)
            ->get();

        return $this->showAll($products);
    }
}
