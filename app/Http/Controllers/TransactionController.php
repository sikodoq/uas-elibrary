<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // eagerload for optimization load query relationship
        $transactions = Transaction::with(['member', 'book'])->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::where('status', '=', 1)->orderBy('name', 'ASC')->get();
        $books = Book::where('stock', '>=', 1)->orderBy('book_code', 'ASC')->get();
        return view('transactions.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        /* $sum = Book::findOrFail($request->book_id);
        Book::where('id', $request->book_id)->update([
            'stock' => $sum->stock - 1
        ]); */

        Transaction::create($request->all());
        Alert::success('Success', 'Transaction has been added');
        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $transaction = Transaction::findOrFail($transaction->id);
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update([
            'return_date' => $request->return_date
        ]);
        Alert::success('Success', 'Transaction Updated Successfully');
        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction = Transaction::findOrFail($transaction->id);
        $sum = Book::findOrFail($transaction->book_id);
        Book::where('id', $transaction->book_id)->update([
            'stock' => $sum->stock + 1
        ]);

        $transaction->delete();
        Alert::success('Success', 'Book Return Successfully');
        return redirect()->route('transactions.index');
    }

    public function return(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update([
            'is_returned' => $request->is_returned
        ]);

        Alert::success('Success', 'Transaction Updated Successfully');
        return redirect()->route('transactions.index');
    }
}
