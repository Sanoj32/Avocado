<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Models;
use phpDocumentor\Reflection\PseudoTypes\True_;

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

# Route for genres
Route::get('/', function () {
    $genres = Models\Genre::all();
    return view('welcome', compact('genres'));
});
Route::get('/genre/create', [GenreController::class, 'create'])->name('genre.create');
Route::post('/genre', [GenreController::class, 'store'])->name('genre.store');
Route::get('/genre/{genre}/edit', [GenreController::class, 'edit'])->name('genre.edit');
Route::patch('/genre/{genre}', [GenreController::class, 'update'])->name('genre.update');
Route::delete('/genre/{genre}', [GenreController::class, 'destroy'])->name('genre.destroy');

# Routes for videos
Route::get('/genre/{genre}/videos', [VideoController::class, 'index'])->name('video.index');
Route::get('/genre/{genre}/videos/create', [VideoController::class, 'create'])->name('video.create');
Route::post('/genre/{genre}/videos', [VideoController::class, 'store'])->name('video.store');
Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('video.edit');
Route::patch('/videos/{video}', [VideoController::class, 'update'])->name('video.update');
Route::delete('videos/{video}', [VideoController::class, 'destroy'])->name('video.destroy');
