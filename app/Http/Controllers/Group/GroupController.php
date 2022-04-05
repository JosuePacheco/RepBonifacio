<?php

namespace App\Http\Controllers\Group;

use App\Models\Group;
use App\Http\Requests\GroupRequest;
use App\Http\Controllers\ApiController;

class GroupController extends ApiController
{
	public function store(GroupRequest $request)
	{
		$user = auth()->user();
		if ($user->group) {
			return $this->errorResponse(
				"El usuario ya tiene un grupo asignado",
				409
			);
		}

		$group = Group::create([
			"name" => $request->name,
			"user_id" => auth()->user()->id,
			"group_code" => $request->group_code,
			"password" => $request->password,
		]);
		$group->users()->attach(auth()->user()->id);
		return $this->showOne($group, 201);
	}

	public function show(Group $group)
	{
		return $this->showOne($group);
	}

	public function update(GroupRequest $request, Group $group)
	{
		$group->fill($request->all());
		if ($group->isClean()) {
			return $this->errorResponse(
				"Se debe especificar al menos un valor diferente para actualizar",
				422
			);
		}
		$group->save();
		return $this->showOne($group);
	}
}
