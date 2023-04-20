<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TechnologyController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function() {
    Auth::routes(['register' => false]);
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::prefix('technology')->group(function () {
            Route::get('/', [TechnologyController::class, 'index'])->name('technology.home');
            Route::get('add', [TechnologyController::class, 'add'])->name('technology.add');
            Route::post('submit', [TechnologyController::class, 'submit'])->name('technology.submit');
            Route::get('/edit/{id}', [TechnologyController::class, 'edit'])->name('technology.edit');
            Route::post('/update/{id}', [TechnologyController::class, 'update'])->name('technology.update');
            Route::post('delete', [TechnologyController::class, 'delete'])->name('technology.delete');
        });
    });
});