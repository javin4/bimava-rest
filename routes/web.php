<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () { return View::make('pages.home'); });
Route::get('/companies', function () { return View::make('pages.companies'); });
Route::get('/responses', function () { return View::make('pages.responses'); });
Route::get('/project', function () { return View::make('pages.project'); });
Route::get('/lv', function () { return View::make('pages.lv'); });