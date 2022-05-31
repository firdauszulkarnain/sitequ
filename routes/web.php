<?php

use App\Http\Controllers\BrowsingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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


Route::get('/searching', function () {
    return view('searching');
});

Route::get('/kuesioner', function () {
    return view('kuesioner');
});

Route::get('/about', function () {
    return view('about');
});
