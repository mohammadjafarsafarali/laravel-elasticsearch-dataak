<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('search', [SearchController::class, 'search']);

Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
Route::post('subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe.set');
