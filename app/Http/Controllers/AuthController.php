<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\ApiController;
use App\Models\Branch;
use App\Models\Shop;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
    public function __construct()
    {
        $this->middleware("auth:api", ["except" => ["login", "register"]]);
    }

    public function login(LoginRequest $request)
    {
        if (!($token = auth()->attempt(request(["email", "password"])))) {
            return $this->errorResponse("Revisa tus credenciales", 401);
        }

        return $this->respondWithToken($token);
    }

    public function user()
    {
        $user = auth()->user();
        $group = $user->group;
        if (!$group) {
            return $this->successResponse(
                [$user, "group_id" => "", "group_name" => ""],
                200
            );
        }
        return $this->successResponse(
            [
                $user,
                "group_id" => $user->group->id,
                "group_name" => $user->group->name,
            ],
            200
        );
    }

    public function logout()
    {
        auth()->logout();
        return $this->showMessage("Sesion terminada");
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function register(RegisterRequest $request)
    {
        $shop = Shop::create([
            "name" => $request->name_shop,
            "description" => $request->description,
            "password" => bcrypt($request->password_shop),
        ]);
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "userable_type" => Shop::class,
            "userable_id" => $shop->id,
        ]);

        $token = auth()->attempt([
            "email" => $request->email,
            "password" => $request->password,
        ]);

        return $this->successResponse(
            [
                "message" => "Usuario Registrado exitosamente",
            ],
            201
        );
    }

    protected function respondWithToken($token)
    {
        $user = auth()->user();
        if ($user->userable_type == Shop::class) {
            $shop = Shop::find($user->userable_id)->get();
            return response()->json([
                "token" => $token,
                "type" => "bearer",
                "expires_in" =>
                    auth()
                        ->factory()
                        ->getTTL() * 60,
                "user" => $user,
                "shop" => $shop,
            ]);
        }
        if ($user->userable_type == Branch::class) {
            $branch = Branch::find($user->userable_id)->get();
            return response()->json([
                "token" => $token,
                "type" => "bearer",
                "expires_in" =>
                    auth()
                        ->factory()
                        ->getTTL() * 60,
                "user" => $user,
                "branch" => $branch,
            ]);
        }
    }
}
