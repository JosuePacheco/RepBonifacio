<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Http\Controllers\ApiController;
use App\Http\Requests\ShopRequest;

class ShopController extends ApiController
{
    public function show(Shop $shop)
    {
        return $this->showOne($shop);
    }

    public function update(ShopRequest $request, Shop $shop)
    {
        $shop->fill($request->all());
        if ($shop->isClean()) {
            return $this->errorResponse(
                "Se debe especificar al menos un valor diferente para actualizar",
                422
            );
        }
        $shop->save();
        return $this->showOne($shop);
    }
}
