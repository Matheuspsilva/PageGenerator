<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

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

Auth::routes();

Route::get('/generate', [CardController::class, 'index']);
Route::post('/qrcode', [CardController::class, 'generate'])->name('qrcode');
Route::get('page/{slug}', [CardController::class, 'showPage']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





