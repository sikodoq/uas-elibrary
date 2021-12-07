<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route resource users
Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');

// route resource members
Route::resource('members', App\Http\Controllers\MemberController::class)->middleware('auth');

// route resource books
Route::resource('books', App\Http\Controllers\BookController::class)->middleware('auth');

// route resource authors
Route::resource('authors', App\Http\Controllers\AuthorController::class)->middleware('auth');

// route resource categories
Route::resource('categories', App\Http\Controllers\CategoryController::class)->middleware('auth');

// route resource publishers
Route::resource('publishers', App\Http\Controllers\PublisherController::class)->middleware('auth');

// route resource transactions
// Route::resource('transactions', App\Http\Controllers\TransactionController::class);

// route resource transactions
// Route::get('transactions/{transaction}/borrow', [App\Http\Controllers\TransactionController::class, 'borrow'])->name('transactions.borrow');

// route resource transactions
// Route::get('transactions/{transaction}/return', [App\Http\Controllers\TransactionController::class, 'return'])->name('transactions.return');

// route resource transactions
// Route::get('transactions/{transaction}/borrow-return', [App\Http\Controllers\TransactionController::class, 'borrowReturn'])->name('transactions.borrow-return');
