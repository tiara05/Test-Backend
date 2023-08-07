<?php

use App\Http\Controllers\Auth\AuthenticationController;

use App\Http\Controllers\Api\CategoriesController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::POST('auth/login', [AuthenticationController::class, 'login']);

Route::apiResource('/cats', App\Http\Controllers\Api\CategoriesController::class);

Route::apiResource('/news', App\Http\Controllers\Api\NewsController::class);

Route::apiResource('/pages', App\Http\Controllers\Api\CustomPageController::class);

Route::apiResource('/comment', App\Http\Controllers\Api\CommentController::class);