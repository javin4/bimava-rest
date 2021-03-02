<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LVController;
use App\Http\Controllers\BglController;
use App\Http\Controllers\On_UlgController;
use App\Http\Controllers\PPhaseController;
use App\Http\Controllers\On\OnlbController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PElementController;
use App\Http\Controllers\PComponentController;
use App\Http\Controllers\PElementTypController;

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
    Route::get      ('/project/{project}', [ProjectController::class, 'show']);
    Route::post     ('/project', [ProjectController::class, 'store']);
    Route::put      ('/project/{project}', [ProjectController::class, 'update']);
    Route::delete   ('/project/{project}', [ProjectController::class, 'destroy']);


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
Route::get      ('/pelementtyp/computeEhp/{pelementtyp}', [PElementTypController::class, 'computeEhp']);
Route::post      ('/pelementtyps-test/{id}', [PElementTypController::class, 'test']);


//pcomponents
Route::get          ('/PComponents', [PComponentController::class, 'index']);
Route::get          ('/PComponent/{PComponent}', [PComponentController::class, 'show']);
Route::post         ('/PComponent', [PComponentController::class, 'store']);
Route::put          ('/PComponent/{PComponent}', [PComponentController::class, 'update']);
Route::delete       ('/PComponent/{PComponent}', [PComponentController::class, 'destroy']);

Route::put          ('/PComponent/{PComponent}/Bgl/{Bgl}', [PComponentController::class, 'attachBgl']);

//get all PElementtyps by PComponent
Route::get          ('/PComponent/{PComponent}/PElementtyps', [PComponentController::class, 'indexPElementtyps']);

//bgl
Route::get          ('/bgls', [BglController::class, 'index']);
Route::get          ('/bglsH', [BglController::class, 'indexH']);

//onlb zum testen
Route::get          ('/onlb', [OnlbController::class, 'index']);
Route::post          ('/onlb', [OnlbController::class, 'store']);

Route::get          ('/onulgs', [On_UlgController::class, 'index']);