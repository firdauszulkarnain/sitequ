<?php

use App\Http\Controllers\BrowsingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchingController;
use App\Http\Controllers\SurahController;
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

Route::get('/', [DashboardController::class, 'index']);
Route::get('/browsing', [BrowsingController::class, 'index']);
Route::get('/browsing/{name}/{any}', [BrowsingController::class, 'browsing']);
Route::get('/surah/detail/{any}', [SurahController::class, 'detail']);
Route::get('/searching', [SearchingController::class, 'index']);

Route::get('/kuesioner', function () {
    return view('kuesioner');
});
Route::get('/about', function () {
    return view('about');
});
