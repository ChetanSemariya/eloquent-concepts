<?php

use Illuminate\Support\Facades\Route;
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

Route::get('user', [UserController::class, 'index'])->name('user.index');
Route::match(['GET','POST'], 'add-user', [UserController::class, 'addUser'])->name('addUser');
Route::get('view-user/{id}', [UserController::class, 'viewUser'])->name('view-user');
Route::match(['get','post'], 'edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
Route::delete('delete-user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
