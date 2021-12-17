<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('users', UserController::class)->middleware('role:Admin'); // route resource members
Route::resource('members', MemberController::class)->middleware('role:Admin&Operator'); // route change status member
Route::get('changeStatus', [MemberController::class, 'changeStatus'])->name('changeStatus')->middleware('role:Admin&Operator');; // route resource books
Route::resource('books', BookController::class)->middleware('role:Admin&Operator'); // route resource authors
Route::resource('authors', AuthorController::class)->middleware('role:Admin&Operator'); // route resource categories
Route::resource('categories', CategoryController::class)->middleware('role:Admin&Operator'); // route resource publishers
Route::resource('publishers', PublisherController::class)->middleware('role:Admin'); // route resource transactions
Route::resource('transactions', TransactionController::class)->middleware('role:Admin&Operator');
