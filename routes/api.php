<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Line\LineController;
use App\Http\Controllers\Group\GroupController;
use App\Http\Controllers\Shop\ShopLineController;
use App\Http\Controllers\Branch\BranchController;
use App\Http\Controllers\Shop\ShopAuthController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Shop\ShopBranchController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Group\GroupLineController;
use App\Http\Controllers\Expense\ExpenseController;
use App\Http\Controllers\Shop\ShopProductController;
use App\Http\Controllers\Shop\ShopCategoryController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Group\GroupCategoryController;
use App\Http\Controllers\Branch\BranchClientController;
use App\Http\Controllers\Branch\BranchExpenseController;
use App\Http\Controllers\Branch\BranchProductController;
use App\Http\Controllers\Sale\SaleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    [
        "prefix" => "auth",
    ],
    function () {
        Route::post("login", [AuthController::class, "login"])->name("login");
        Route::post("logout", [AuthController::class, "logout"])->name(
            "logout"
        );
        Route::post("refresh", [AuthController::class, "refresh"])->name(
            "refresh"
        );
        Route::post("register", [AuthController::class, "register"])->name(
            "register"
        );
        Route::get("user", [AuthController::class, "user"])->name("user");
    }
);

Route::group(
    [
        "middleware" => ["auth:api"],
    ],
    function () {
        Route::resource("groups", GroupController::class)->only(
            "show",
            "store",
            "update"
        );
        Route::resource("groups.lines", GroupLineController::class)->only(
            "index",
            "store"
        );
        Route::resource(
            "groups.categories",
            GroupCategoryController::class
        )->only("index", "store");

        Route::resource("shops", ShopController::class)->only(
            "show",
            "update",
            "destroy"
        );
        Route::resource("shops.lines", ShopLineController::class)->only(
            "index",
            "store"
        );
        Route::resource(
            "shops.categories",
            ShopCategoryController::class
        )->only("index", "store");

        Route::resource("shops.branches", ShopBranchController::class)->only(
            "index",
            "store"
        );
        Route::resource("branches", BranchController::class)->only(
            "show",
            "update",
            "destroy"
        );
        Route::get("shops", ShopAuthController::class);
        Route::resource("lines", LineController::class)->only(
            "show",
            "destroy",
            "update"
        );
        Route::resource("clients", ClientController::class)->only(
            "show",
            "update",
            "destroy"
        );

        Route::resource(
            "branches.clients",
            BranchClientController::class
        )->only("index", "store");

        Route::resource("expenses", ExpenseController::class)->only(
            "show",
            "update",
            "destroy"
        );

        Route::resource("products", ProductController::class)->except("index");

        Route::resource("shops.products", ShopProductController::class)->only(
            "index"
        );
        Route::resource(
            "branches.expenses",
            BranchExpenseController::class
        )->only("index", "store");

        Route::get(
            "branches/{branch}/products",
            BranchProductController::class
        );

        Route::resource("categories", CategoryController::class)->except(
            "create",
            "edit"
        );

        Route::resource("sales", SaleController::class)->only("store");
    }
);
