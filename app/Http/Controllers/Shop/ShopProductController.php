<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Http\Controllers\ApiController;

class ShopProductController extends ApiController
{
    public function index(Shop $shop)
    {
        $products = $shop->branches()->products;

        return $this->showAll($products);
    }
}
