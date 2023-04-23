<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('index');
});

Route::get('/regions/{regionID}', [\App\Http\Controllers\HomeController::class, 'getRegionFromWiki']);

Route::get('/regions/{regionID}/sustainability-score', [\App\Http\Controllers\HomeController::class, 'getSustainability']);

Route::get('/', function (){
   return view('home');
});

