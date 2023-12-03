<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentLogController;

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

// Example Routes

Route::middleware(['only_guest'])->group(function () {
    Route::view('/', 'landing');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('only_admin');
    Route::get('/profile', [UserController::class, 'profile'])->middleware('only_client');

    Route::get('/books', [BookController::class, 'index']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category-add', [CategoryController::class, 'add']);
    Route::post('/category-add', [CategoryController::class, 'store']);
    Route::get('/category-edit/{slug}', [CategoryController::class, 'edit']);
    Route::put('/category-edit/{slug}', [CategoryController::class, 'update']);
    Route::get('/category-delete/{slug}', [CategoryController::class, 'delete']);
    Route::get('/category-destroy/{slug}', [CategoryController::class, 'destroy']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/rent-logs', [RentLogController::class, 'index']);
});


Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
