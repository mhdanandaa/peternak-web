<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
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

Route::get('/',[ModuleController::class,'homePage'])->name('homePage');
Route::get('/module/{module?}',[ModuleController::class,'modulePage'])->where('module', '.*')->name('modulePage');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard/{module?}', [ModuleController::class,'dashboardPage'])->where('module', '.*')->name('dashboard');
    Route::post('/module', [ModuleController::class,'addModule'])->name('addModule');
    Route::put('/module', [ModuleController::class,'updateModule'])->name('updateModule');
    Route::delete('/module', [ModuleController::class,'deleteModule'])->name('deleteModule');
    Route::post('/playlist', [PlaylistController::class,'addPlaylist'])->name('addPlaylist');
    Route::get('/playlist/{id}', [PlaylistController::class,'playlistPage'])->name('playlistPage');
    Route::get('/video/{playlist_id}/{video_id}', [VideoController::class,'videoPage'])->name('videoPage');
    Route::delete('/playlist/{id}', [PlaylistController::class,'deletePlaylist'])->name('deletePlaylist');
    Route::post('/note/{video_id}', [NoteController::class,'updateNote'])->name('updateNote');
});

require __DIR__.'/auth.php';
