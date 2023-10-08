<?php

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

use App\Http\Controllers\MineralResourceDataSystemController;
use Illuminate\Support\Facades\Route;

Route::group(['/'], function () {
  Route::get("hello", function () {
    return response()->json([
      "message" => "Hello World"
    ]);
  });
});

Route::prefix('mrds')->controller(MineralResourceDataSystemController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/{id}', 'show')->whereNumber('id');
  Route::get('/search', 'search');
  Route::get('/list', 'list');
});
