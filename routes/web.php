<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\DeveloperLevelController;
use App\Http\Controllers\Admin\QuestionController;

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

        Route::prefix('developer-level')->group(function () {
            Route::get('/', [DeveloperLevelController::class, 'index'])->name('developer.level.home');
            Route::get('add', [DeveloperLevelController::class, 'add'])->name('developer.level.add');
            Route::post('submit', [DeveloperLevelController::class, 'submit'])->name('developer.level.submit');
            Route::get('/edit/{id}', [DeveloperLevelController::class, 'edit'])->name('developer.level.edit');
            Route::post('/update/{id}', [DeveloperLevelController::class, 'update'])->name('developer.level.update');
            Route::post('delete', [DeveloperLevelController::class, 'delete'])->name('developer.level.delete');
        });

        Route::prefix('question')->group(function () {
            Route::get('/', [QuestionController::class, 'index'])->name('question.home');
            Route::get('add', [QuestionController::class, 'add'])->name('question.add');
            Route::post('submit', [QuestionController::class, 'submit'])->name('question.submit');
            Route::get('show/{id}', [QuestionController::class, 'show'])->name('question.show');
            Route::get('edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
            Route::post('/update/{id}', [QuestionController::class, 'update'])->name('question.update');
            Route::Post('delete', [QuestionController::class, 'delete'])->name('question.delete');
        });
    });
});