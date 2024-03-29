<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
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
// Route::get('/', function () {
//     return view('pages.welcome');
// })->name('welcome');

Route::get('/', [BookController::class, 'index']);
Route::get('/top-author', [BookController::class, 'topAuthor']);
Route::Post('/search', [BookController::class, 'search']);
Route::Post('/add-rating', [RatingController::class, 'add_rating']);
Route::get('/rating', [RatingController::class, 'index']);