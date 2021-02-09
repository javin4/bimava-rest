<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LVController;
use App\Http\Controllers\PElementController;
use App\Http\Controllers\PElementTypController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PPhaseController;

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

//projects ------------------------------------------------------------------------
    Route::get      ('/projects', [ProjectController::class, 'index']);
    Route::get      ('/project/{id}', [ProjectController::class, 'show']);
    Route::post     ('/project', [ProjectController::class, 'store']);
    Route::put      ('/project/{project_id}', [ProjectController::class, 'update']);
    Route::delete   ('/project/{id}', [ProjectController::class, 'destroy']);


//lv ------------------------------------------------------------------------------
    Route::get      ('/lvs', [LVController::class, 'index']);
    Route::get      ('/lvs/{project_id}', [LVController::class, 'allByProjectID']); 
    Route::get      ('/lv/{id}', [LVController::class, 'show']);
    Route::post     ('/lv', [LVController::class, 'store']);
    Route::put      ('/lv/{id}', [LVController::class, 'update']);
    Route::delete   ('/lv/{id}', [LVController::class, 'destroy']);

//pphases ------------------------------------------------------------------------------
    Route::get      ('/pphases/{root_id}', [PPhaseController::class, 'index']);
    Route::get      ('/test', [PPhaseController::class, 'index2']);

//Element-Methode
Route::get      ('/pelements', [PElementController::class, 'index']);
Route::get      ('/pelementtyps', [PElementTypController::class, 'index']);