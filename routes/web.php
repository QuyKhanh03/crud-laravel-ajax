<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Route::get('list-users', [UserController::class, 'getUsers'])->name('list-users');
Route::get('users', [UserController::class, 'index'])->name('products');
Route::get('delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');

