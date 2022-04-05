<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\ApiController;

class ShopCategoryController extends ApiController
{
    public function index(Shop $shop)
    {
        $categories = $shop->categories;

        return $this->showAll($categories);
    }

    public function store(CategoryRequest $request, Shop $shop)
    {
        $category = Category::create([
            "name" => $request->name,
            "type" => $request->type,
            "categoryable_type" => Shop::class,
            "categoryable_id" => $shop->id,
        ]);
        return $this->showOne($category);
    }
}
