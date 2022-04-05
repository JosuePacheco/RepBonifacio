<?php

namespace App\Http\Controllers\Shop;

use App\Models\Line;
use App\Models\Shop;
use App\Http\Requests\LineRequest;
use App\Http\Controllers\ApiController;

class ShopLineController extends ApiController
{
    public function index(Shop $shop)
    {
        $lines = $shop->lines;
        return $this->showAll($lines);
    }

    public function store(LineRequest $request, Shop $shop)
    {
        $line = Line::create([
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'discount' => $request->discount,
            'lineable_type' => Shop::class,
            'lineable_id' => $shop->id
        ]);
        return $this->showOne($line);
    }
}
