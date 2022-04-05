<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\ApiController;

class CategoryController extends ApiController
{
    public function index()
    {
        $categories = Category::all();

        return $this->showAll($categories);
    }

    public function show(Category $category)
    {
        return $this->showOne($category);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        if ($category->isClean()) {
            return $this->errorResponse(
                "You need to specify a different value to update",
                422
            );
        }
        $category->save();

        return $this->showOne($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return $this->showOne($category);
    }
}
