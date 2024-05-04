<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\CommentController;

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

// Eloquent Routes
Route::get('user', [UserController::class, 'index'])->name('user.index');
Route::match(['GET','POST'], 'add-user', [UserController::class, 'addUser'])->name('addUser');
Route::get('view-user/{id}', [UserController::class, 'viewUser'])->name('view-user');
Route::match(['get','post'], 'edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
Route::delete('delete-user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// Relationship Routes
Route::resource('student', StudentController::class);
Route::get('/contact', [ContactController::class, 'show']);

// one to many
// Route::resource('book', BookController::class);

// image upload route
Route::resource('fileupload', FileUploadController::class);

/* --------- RESOURCE CONTROLLER ROUTE CONCEPTS ----------------*/

// Route::resource('resource', ResourceController::class); // this type of method define all seven routes

// if we want to use only specific routes not all seven routes then we can write like that
// Route::resource('resource', ResourceController::class)->only([
//     'create','update','show'
// ]);

/* ----- Agar hume kinhi do method ko chodkr baki sabhi routes ka use krna hoto except method ki help se krskte hai ------*/
// Route::resource('resource', ResourceController::class)->except([
//     'update','show'
// ]);

/* ---- Agar hume resource controller k routes name mai changes krna hoto usee iss tarah se krskte hai names array pass krke --- */
// Route::resource('resource', ResourceController::class)->names([
//     'create' => 'resource.build',
//     'show' => 'resource.view'
// ]);

/* ------- MUltiple Resource Controller ko ek hi route se Kuch iss tarah se manage krskte hai ------ */

// Route::resource([
//     'users' => UserController::class,
//     'post' => PostController::class
// ]);

/* -----------------HOW TO USE NESTED RESOURCE CONTROLLER CONTROLLER ------------------------*/

// Route::resource('resource.comments', CommentController::class); // users is parent resource controller and comments is a child resource controller i.e user pr aaake koi comments bhi pass krskta hai

Route::resource('resource.comments', CommentController::class)->shallow(); // shallow method ka use isly kiya jata hai qk nested resource route banate time routes mai hume 2 id pass krni hoti hai parent ki bhi or comment ki bhi, to iss problem k solution k liye shallow method ka use kiya jata hai. yhh method jaha jarurat hai bss vahi parent resource ki id leta hai ex: index, create or store or baki jagah child resource route ki id ex: show,update,store,destroy
 