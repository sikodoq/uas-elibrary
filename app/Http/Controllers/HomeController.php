<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:Admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::get();
        $categories = [];
        $borrowed = [];
        foreach ($books as $book) {
            $borrow = Transaction::where('is_returned', 0)->count();
            $categories[] = $book->name;
            $borrowed[] = $borrow;
        }

        return view('home', [
            'books' => Book::count(),
            'transactions' => Transaction::count(),
            'borrowed' => Transaction::where('is_returned', 0)->count(),
            'returned' => Transaction::where('is_returned', 1)->count(),
            'members' => Member::count(),
            'users' => User::where('role', 'member')->count(),
            'categories' => $categories,
            'data' => $borrowed
        ]);
    }
}
