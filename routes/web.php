<?php

use Illuminate\Support\Facades\Route;

// Controllers

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;

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

Route::get('/', [MainController::class, 'index'])->name('home');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard'); 
        })->name('dashboard');

    Route::resource('projects', ProjectController::class);
    Route::resource('projects', ProjectController::class);

});

require __DIR__.'/auth.php';
