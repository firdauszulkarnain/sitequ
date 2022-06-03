<?php

use App\Http\Controllers\BrowsingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
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
// DASHBOARD & ABOUT
Route::get('/', [DashboardController::class, 'index']);
Route::get('/about', [DashboardController::class, 'about']);

// BROWSING
Route::get('/browsing', [BrowsingController::class, 'index']);
Route::get('/browsing/{name}/{any}', [BrowsingController::class, 'browsing']);

// DETAIL SURAH
Route::get('/surah/detail/{any}', [SurahController::class, 'detail']);
Route::get('/surah/detail-ayat/{name}', [SurahController::class, 'detail_ayat']);

// SEARCHING
Route::get('/searching', [SearchingController::class, 'index']);
Route::post('/searching', [SearchingController::class, 'index']);

// KRITERIA
Route::get('/kriteria/{name}', [KriteriaController::class, 'index']);
Route::get('/kriteria/{name}/{any}', [KriteriaController::class, 'kriteria_result']);

Route::get('/kuesioner', function () {
    return view('kuesioner');
});
