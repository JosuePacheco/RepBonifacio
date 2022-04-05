<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\ApiController;

class ProductController extends ApiController
{
    public function show(Product $product)
    {
        return $this->showOne($product->load('category:id,name', 'line:id,name'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create([
            "clave" => $request->clave,
            "description" => $request->description,
            "weight" => $request->weight,
            "observations" => $request->observations,
            "price" => $request->price,
            "price_purchase" => $request->price_purchase,
            "discount" => $request->discount,
            "discar_cause" => $request->discar_cause,
            "branch_id" => $request->branch_id,
            "line_id" => $request->line_id,
            "category_id" => $request->category_id,
            "user_id" => auth()->user()->id,
            "status_id" => 2,
        ]);

        return $this->showOne($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return $this->showOne($product);
    }

    public function update(Product $product, ProductRequest $request)
    {
        $product->fill($request->all());

        if ($product->isClean()) {
            return $this->errorResponse(
                "Al menos un valor debe ser distinto para poder actualizar",
                422
            );
        }

        $product->save();

        return $this->showOne($product);
    }
}
