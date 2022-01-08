<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ProductController;

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

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/show/{id}', [ProductController::class, 'show']);
Route::get('/product/search/{name}', [ProductController::class, 'search']);

Route::group(['middleware'=>['auth-sanctum']], function(){
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::post('/product/update', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'delete']);
    
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
}); 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
