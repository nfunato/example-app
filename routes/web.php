<?php

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
    return view('welcome');
});

Route::get('/todo', \App\Http\Controllers\Todo\IndexController::class)
    ->name('todo.index');

Route::post('/todo/create', \App\Http\Controllers\Todo\CreateController::class)
    ->name('todo.index');

Route::post('/todo/create', \App\Http\Controllers\Todo\CreateController::class)
    ->name('todo.create');

Route::get('/todo/update/{todoId}', \App\Http\Controllers\Todo\Update\IndexController::class)
    ->name('todo.update.index');

Route::put('/todo/update/{todoId}', \App\Http\Controllers\Todo\Update\PutController::class)
    ->name('todo.update.put');

Route::delete('/todo/delete/{todoId}', \App\Http\Controllers\Todo\DeleteController::class)
    ->name('todo.delete');
