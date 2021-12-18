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
        $dataBorrow = [];
        $dataReturn = [];
        foreach ($books as $book) {
            $borrow = Transaction::where('is_returned', 0)->count();
            $return = Transaction::where('is_returned', 1)->count();
            $categories[] = $book->name;
            $dataBorrow[] = $borrow;
            $dataReturn[] = $return;
        }

        return view('home', [
            'books' => Book::count(),
            'transactions' => Transaction::count(),
            'borrowed' => Transaction::where('is_returned', 0)->count(),
            'returned' => Transaction::where('is_returned', 1)->count(),
            'members' => Member::count(),
            'users' => User::where('role', 'member')->count(),
            'categories' => $categories,
            'databorrow' => $dataBorrow,
            'datareturn' => $dataReturn
        ]);
        /* $borrow = Transaction::where('is_returned', 0)->count();
        $return = Transaction::where('is_returned', 1)->count();
        $member = Member::count();
        $user = User::where('role', 'member')->count();
        $book = Book::count();
        $transaction = Transaction::count();
        $data = [
            'borrow' => $borrow,
            'return' => $return,
            'member' => $member,
            'user' => $user,
            'book' => $book,
            'transaction' => $transaction
        ];
        return view('home', compact('data')); */
    }
}
