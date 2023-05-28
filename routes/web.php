<?php

use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LocalizationController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/', [HomeController::class, "home_page"]);


Route::group(['middleware' => ['auth']], function () {

Route::get("/logout" , [UserController::class , "logout"]);

});

Route::get('/login', [UserController::class, "login_page"]);
Route::post('login-action', [UserController::class, "login_action"]);

Route::get('/sign-up', [UserController::class, "signup_page"]);
Route::post('signup-action', [UserController::class, "signup_action"]);

Route::get('/my-cart', [OrderController::class, "my_cart"]);


////////////////////////////// Ajax Requests /////////////////////////////////
Route::get('get-region/{city_id}', [AjaxController::class, "get_region"]);
Route::get('add-to-cart/{product_id}/{quantity}', [AjaxController::class, "add_to_cart"]);
Route::get("get-my-cart" , [AjaxController::class , "get_my_cart"]);
Route::get("remove-item-from-cart/{item_id}" , [AjaxController::class , "remove_item_from_cart"]);
Route::get("increase-cart-quantity/{item_id}" , [AjaxController::class , "increase_cart_quantity"]);
Route::get("decrease-cart-quantity/{item_id}" , [AjaxController::class , "decrease_cart_quantity"]);
