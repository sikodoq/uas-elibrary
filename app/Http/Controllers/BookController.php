<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBookRequest;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // eagerload for optimization load query relationship
        $books = Book::with(['author', 'category', 'publisher'])->latest()->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('books.create', compact('authors', 'categories', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        // create new book
        $book = Book::create($request->all());

        if ($request->hasFile('image')) {
            // get file name with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // upload image
            $path = $request->file('image')->storeAs('public/images/books', $fileNameToStore);
        } else {
            $fileNameToStore = 'no-image.png';
        }

        // update book with image
        $book->update([
            'image' => $fileNameToStore
        ]);

        // redirect
        Alert::success('Success', 'Book has been created');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::orderby('name', 'asc')->get();
        $categories = Category::orderby('name', 'asc')->get();
        $publishers = Publisher::orderby('name', 'asc')->get();

        return view('books.edit', compact('book', 'authors', 'categories', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        // update book
        $book->update($request->all());
        // $book = Book::create($request->all());

        if ($request->hasFile('image')) {
            // get file name with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // upload image
            $path = $request->file('image')->storeAs('public/images/books', $fileNameToStore);
        } else {
            $fileNameToStore = 'no-image.png';
        }
        Alert::success('Success', 'Book has been updated successfully');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // delete storage image
        $image = $book->image;
        if ($image != 'no-image.png') {
            Storage::delete('public/images/books/' . $image);
        }

        $book->delete();
        Alert::success('Success', 'The book has been deleted successfully');
        return redirect()->route('books.index');
    }
}
