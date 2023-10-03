<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('top');
});

Route::resource('user', UserController::class);

Route::get('/create', function () {
    return view('create');
});

Route::get('/history', function () {
    return view('history');
});

// Chat GPT
Route::get('/create', [ChatGptController::class, 'index'])->name('chat_gpt-index');
Route::post('/create', [ChatGptController::class, 'chat'])->name('chat_gpt-chat');
