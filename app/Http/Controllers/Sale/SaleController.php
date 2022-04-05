<?php

namespace App\Http\Controllers\Sale;

use App\Models\Sale;
use App\Models\Product;
use App\Http\Requests\SaleRequest;
use App\Http\Controllers\ApiController;
use App\Models\SaleDetail;

class SaleController extends ApiController
{
    public function store(SaleRequest $request)
    {
        $user = auth()->user();

        foreach ($request->products as $product) {
            $p = Product::find($product["id"]);
            $currentStatus = $p->status->id;

            switch ($currentStatus) {
                case 1:
                    return $this->errorResponse(
                        "El producto con clave: " .
                            $p->clave .
                            " se encuentra en otra venta",
                        409
                    );
                    break;
                case 3:
                    return $this->errorResponse(
                        "El producto con clave: " .
                            $p->clave .
                            " se encuentra en un transpaso",
                        409
                    );
                    break;
                case 4:
                    return $this->errorResponse(
                        "El producto con clave: " .
                            $p->clave .
                            " se encuentra en una dañado",
                        409
                    );
                    break;
                case 5:
                    return $this->errorResponse(
                        "El producto con clave: " .
                            $p->clave .
                            " se encuentra con estatus faltante",
                        409
                    );
                    break;
                default:
                    break;
            }
        }

        $sale = Sale::create([
            "client_id" => $request->client_id,
            "seller_id" => $user->id,
            "branch_id" => $request->branch_id,
            "total" => $request->total,
            "income" => $request->income,
            "paid_out" => $request->paid_out,
            "change" => $request->change,
            "folio" => $request->folio,
        ]);

        foreach ($request->products as $product) {
            $p = Product::find($product["id"]);
            SaleDetail::create([
                "sale_id" => $sale->id,
                "product_id" => $p->id,
                "final_price" => $product["final_price"],
                "profit" => $product["final_price"] - $p->price_purchase,
            ]);

            $p["status_id"] = 1;
            $p->save();
        }
        return $this->showOne($sale);
    }
}
