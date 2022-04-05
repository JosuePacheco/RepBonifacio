<?php

namespace App\Http\Controllers\Group;

use App\Models\Group;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\ApiController;

class GroupCategoryController extends ApiController
{
    public function index(Group $group)
    {
        $categories = $group->categories;

        return $this->showAll($categories);
    }

    public function store(CategoryRequest $request, Group $group)
    {
        $category = Category::create([
            "name" => $request->name,
            "type" => $request->type,
            "categoryable_type" => Group::class,
            "categoryable_id" => $group->id,
        ]);
        return $this->showOne($category);
    }
}
