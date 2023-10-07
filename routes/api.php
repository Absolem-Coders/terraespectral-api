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

use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function () {
  Route::get("hello", function () {
    return response()->json([
      "message" => "Hello World"
    ]);
  });
});
