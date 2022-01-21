<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'testswag'], function () {
    Route::resource('t_est_swaggers', App\Http\Controllers\API\Testswag\TEstSwaggerAPIController::class);
});


Route::resource('testswags', App\Http\Controllers\API\TestswagAPIController::class);


Route::group(['prefix' => 'v1.jurnallar'], function () {
    Route::resource('jurnal_toplamlari', App\Http\Controllers\API\V1\Jurnallar\JurnalToplamiAPIController::class);
});
