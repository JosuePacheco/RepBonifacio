<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\Branch;
use App\Http\Requests\BranchRequest;
use App\Http\Controllers\ApiController;

class ShopBranchController extends ApiController
{
	public function index(Shop $shop)
	{
		$branches = $shop->branches;

		return $this->showAll($branches);
	}

	public function store(Shop $shop, BranchRequest $request)
	{
		$branch = Branch::create([
			"name" => $request->name,
			"name_legal_re" => $request->name_legal_re,
			"email" => $request->email,
			"telephone_number" => $request->telephone_number,
			"rfc" => $request->rfc,
			"address" => $request->address,
			"shop_id" => $shop->id,
			"municipality_id" => $request->municipality_id,
			"commission" => $request->commission,
		]);

		return $this->showOne($branch);
	}
}
