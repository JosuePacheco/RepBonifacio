<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Http\Controllers\ApiController;

class ShopAuthController extends ApiController
{
    public function __invoke()
    {
        $shop = Shop::find(auth()->user()->userable_id);

        return $this->showOne($shop);
    }
}
