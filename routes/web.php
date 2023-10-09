<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ChatGptController;
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

Route::get('/', [DiaryController::class, 'show_top'])->name('top');

Route::resource('user', UserController::class);

// Route::get('/create', function () {
//     return view('create');
// });

Route::prefix('create')->
    group(function () {
        Route::get('/', [DiaryController::class, 'create'])->name('create');
        Route::post('/store', [DiaryController::class, 'store'])->name('store');
        // Chat GPT
        Route::get('/', [ChatGptController::class, 'index'])->name('chat_gpt-index');
        Route::post('/', [ChatGptController::class, 'chat'])->name('chat_gpt-chat');
    });

Route::prefix('history')->
    group(function () {
        Route::get('/{id}', [DiaryController::class, 'index'])->name('history');
        Route::get('edit/{id}', [DiaryController::class, 'edit'])->name('history-edit');
        Route::post('update/{id}', [DiaryController::class, 'update'])->name('history-update');
    });


