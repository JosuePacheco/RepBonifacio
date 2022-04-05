<?php

namespace App\Http\Controllers\Group;

use App\Models\Line;
use App\Models\Group;
use App\Http\Requests\LineRequest;
use App\Http\Controllers\ApiController;

class GroupLineController extends ApiController
{

    public function index(Group $group)
    {
        $lines = $group->lines;

        return $this->showAll($lines);
    }

    public function store(LineRequest $request, Group $group)
    {
        $line = Line::create([
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'discount' => $request->discount,
            'lineable_type' => Group::class,
            'lineable_id' => $group->id
        ]);
        return $this->showOne($line);
    }
}
