<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\ApiController;

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

Route::get('get-all-technology', [ApiController::class, 'getAllTechnology']);
Route::get('get-all-question/{technology_id}/{level_id}', [ApiController::class, 'getAllQuestion']);
Route::get('get-all-developer-level', [ApiController::class, 'getAllDeveloperLevel']);
