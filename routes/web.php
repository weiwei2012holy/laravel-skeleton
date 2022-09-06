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
    return "hello~~";
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

# [index,create,store,show,edit,update,destroy]
# APP 用户管理
Route::resource('appUsers', App\Http\Controllers\AppUserController::class)->except(['destroy','show']);

Route::resource('users', App\Http\Controllers\UserController::class);
