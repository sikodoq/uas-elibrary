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

Route::get('/home', [HomeController::class, 'index'])->name('home');

// route resource users
Route::resource('users', UserController::class)->middleware('auth');

// route resource members
Route::resource('members', MemberController::class)->middleware('auth');

// route change status member
Route::get('changeStatus', [MemberController::class, 'changeStatus'])->name('changeStatus');

// route resource books
Route::resource('books', BookController::class)->middleware('auth');

// route resource authors
Route::resource('authors', AuthorController::class)->middleware('auth');

// route resource categories
Route::resource('categories', CategoryController::class)->middleware('auth');

// route resource publishers
Route::resource('publishers', PublisherController::class)->middleware('auth');

// route resource transactions
Route::resource('transactions', TransactionController::class)->middleware('auth');

// route resource transactions
// Route::get('transactions/{transaction}/borrow', [TransactionController::class, 'borrow'])->name('transactions.borrow');

// route resource transactions
// Route::get('transactions/{transaction}/return', [TransactionController::class, 'return'])->name('transactions.return');

// route resource transactions
// Route::get('transactions/{transaction}/borrow-return', [TransactionController::class, 'borrowReturn'])->name('transactions.borrow-return');
