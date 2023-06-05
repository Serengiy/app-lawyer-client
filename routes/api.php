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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Роутер приема заявки юриста
Route::post('/lawyer/store', \App\Http\Controllers\Lawyer\StoreController::class);

//Роутер приема нового заявление от клиента
Route::post('/application/store', \App\Http\Controllers\Application\StoreController::class);
//Роутер закрытия задачи
Route::patch('/application/update', \App\Http\Controllers\Application\UpdateStatusController::class);
//Роутер возврата отфлитрованных заявлений
Route::post('/application/index', \App\Http\Controllers\API\FilterController::class);



