<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

Route::post('news/create',[NewsController::class,'create']);
Route::get('news/list',[NewsController::class,'show']);
Route::get('news/list/{id}',[NewsController::class,'showById']);
// Route::put('news/{id}/update',[NewsController::class,'update']);
Route::post('news/{id}/update',[NewsController::class,'update']);
Route::delete('news/{id}/delete',[NewsController::class,'delete']);
Route::get('news/type/{type}',[NewsController::class,'showByType']);
Route::get('news/date/{date}',[NewsController::class,'showByDate']);
Route::get('news/type/date/{type}/{date}',[NewsController::class,'showByTypeAndDate']);