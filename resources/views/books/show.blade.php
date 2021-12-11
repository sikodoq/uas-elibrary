@extends('layouts.app')
@section('title', 'View Book')
@section('header', 'View Book')
@section('menu', 'Book')

@section('content')
    {{-- book show --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $book->title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @if ($book->image)
                                    <img src="{{ $book->Img }}" alt="{{ $book->title }}" class="img-thumbnail">

                                @else
                                    <img src="{{ asset('storage/images/books/no-image.png') }}" alt="{{ $book->title }}"
                                        class="img-thumbnail">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <p>
                                    <strong>Description:</strong> {{ $book->description }}
                                </p>
                                <p>
                                    <strong>Author:</strong> {{ $book->author->name }}
                                </p>
                                <p>
                                    <strong>Category:</strong> {{ $book->category->name }}
                                </p>
                                <p>
                                    <strong>Publisher:</strong> {{ $book->publisher->name }}
                                </p>
                                <p>
                                    <strong>Published Year:</strong> {{ $book->publish_year }}
                                </p>
                                <p>
                                    <strong>ISBN:</strong> {{ $book->isbn }}
                                </p>
                                <p>
                                    <strong>Price:</strong> {{ $book->BookPrice }}
                                </p>
                                <p>
                                    <strong>Stock:</strong> {{ $book->stock }}
                                </p>
                                <p>
                                    <strong>Status:</strong> {!! $book->BookStatus !!}
                                </p>
                                <p>
                                    <strong>Created At:</strong> {{ $book->created_at }}
                                </p>
                                <p>
                                    <strong>Updated At:</strong> {{ $book->updated_at }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-pencil-alt">
                                </i> Edit</a>
                            <button class="btn btn-danger btn-sm" aria-label="Delete" type="submit"
                                onclick="deleteAlert('{{ $book->id }}', 'Delete Book {{ $book->title }}')"><i
                                    class="fas fa-trash">
                                </i> Delete</button>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline"
                                id="Delete{{ $book->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm"><i
                                    class="fas fa-arrow-alt-circle-left"></i>
                                Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
