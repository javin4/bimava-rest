<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LVController;

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

Route::get      ('/projects', [ProjectController::class, 'index']);
Route::get      ('/project/{id}', [ProjectController::class, 'show']);
Route::post     ('/project', [ProjectController::class, 'store']);
Route::put      ('/project/{project}', [ProjectController::class, 'update']);
Route::delete   ('/project/{id}', [ProjectController::class, 'destroy']);

Route::get('/lvs', [LVController::class, 'index']);
Route::post('/lvs', [LVController::class, 'allByProjectID']);