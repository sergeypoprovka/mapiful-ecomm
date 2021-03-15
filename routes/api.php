<?php

use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('preGetVariations', [ProductController::class,'preGetVariations']);
Route::post('createVariations', [ProductController::class,'createVariations']);

Route::get('getStates/{country}', [LocationController::class,'getStates']);
Route::get('getCities/{state}', [LocationController::class,'getCities']);

Route::post('switchLang', [HomeController::class, 'switchLang']);