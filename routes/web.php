<?php

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

use App\Http\Controllers\DicController;
Route::controller(DicController::class)->prefix('dic')->name('dic.')->group(function() {
    Route::get('add', 'ad');
    Route::post('add', 'create')->name('create');
    
    Route::get('display', 'disp');
    Route::get('update', 'up');
    Route::get('deletion', 'del');
    Route::get('index', 'ind');
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
