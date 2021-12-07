@extends('layouts.app')
@section('title', 'Edit Book')
@section('header', 'Edit Book')
@section('menu', 'Edit Book')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Book Data Edit') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" action="{{ route('books.update', $book->id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        {{-- Edit book code --}}
                        <div class="form-group">
                            <label for="book_code">{{ __('Book Code') }}</label>
                            <input type="text" name="book_code" class="form-control" id="book_code"
                                placeholder="Enter Book Code" value="{{ $book->book_code }}" required autofocus>
                        </div>
                        {{-- Edit title --}}
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title"
                                value="{{ $book->title }}" required>
                        </div>
                        {{-- Edit description --}}
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" class="form-control" id="description"
                                placeholder="Enter Description">{{ $book->description }}</textarea>
                        </div>
                        {{-- Edit Select author --}}
                        <div class="form-group">
                            <label for="author_id">{{ __('Author') }}</label>
                            <select class="form-control" name="author_id" id="author_id">
                                <option value="">Select Author</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Edit Select category --}}
                        <div class="form-group">
                            <label for="category_id">{{ __('Category') }}</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Edit Select publisher --}}
                        <div class="form-group">
                            <label for="publisher_id">{{ __('Publisher') }}</label>
                            <select class="form-control" name="publisher_id" id="publisher_id">
                                <option value="">Select Publisher</option>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}"
                                        {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>
                                        {{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Edit Publish Year --}}
                        <div class="form-group">
                            <label for="publish_year">{{ __('Publish Year') }}</label>
                            <input type="text" name="publish_year" class="form-control" id="publish_year"
                                placeholder="Enter Publish Year" value="{{ $book->publish_year }}">
                        </div>
                        {{-- Edit ISBN --}}
                        <div class="form-group">
                            <label for="isbn">{{ __('ISBN') }}</label>
                            <input type="text" name="isbn" class="form-control" id="isbn" placeholder="Enter ISBN"
                                value="{{ $book->isbn }}">
                        </div>
                        {{-- Edit Price --}}
                        <div class="form-group">
                            <label for="price">{{ __('Price') }}</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price"
                                value="{{ $book->price }}">
                        </div>
                        {{-- Edit Stock --}}
                        <div class="form-group">
                            <label for="stock">{{ __('Stock') }}</label>
                            <input type="text" name="stock" class="form-control" id="stock" placeholder="Enter Stock"
                                value="{{ $book->stock }}">
                        </div>
                        {{-- Edit Image --}}
                        <div class="form-group">
                            <label for="image">{{ __('Image') }}</label>
                            <div class="input-group">
                                @if ($book->image)
                                    <img src="{{ asset('storage/images/books/' . $book->image) }}"
                                        alt="{{ $book->title }}" class="img-thumbnail" width="100">

                                @else
                                    <img src="{{ asset('storage/images/no-image.png') }}" alt="{{ $book->title }}"
                                        class="img-thumbnail" width="100">
                                @endif
                            </div>

                            <div class="custom-file mt-2">
                                <input type="file" name="image" class="custom-file-input" id="image"
                                    placeholder="Enter Image" value="{{ $book->image }}">
                                <label class="custom-file-label" for="image">Choose
                                    file</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('books.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->

@section('scripts')
    <!-- jquery-validation -->
    <script src="{{ asset('adminlte') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('adminlte') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endsection

@push('page_scripts')
    <script>
        $(function() {
            bsCustomFileInput.init();
            $('#quickForm').validate({
                rules: {
                    book_code: {
                        required: true,
                        minlength: 3,
                        maxlength: 10,
                    },
                    title: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    description: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    author_id: {
                        required: true
                    },
                    publisher_id: {
                        required: true
                    },
                    publish_year: {
                        required: true,
                        minlength: 4,
                        maxlength: 4,
                        number: true
                    },
                    price: {
                        required: true,
                        minlength: 1,
                        maxlength: 10,
                        number: true
                    },
                    stock: {
                        required: true,
                        minlength: 1,
                        maxlength: 10,
                        number: true
                    },
                    image: {
                        extension: "jpg|jpeg|png|gif"
                    }
                },
                messages: {
                    book_code: {
                        required: "Please enter book code",
                        minlength: "Book code must consist of at least 3 characters",
                        maxlength: "Book code must consist of at most 10 characters"
                    },
                    title: {
                        required: "Please enter book title",
                        minlength: "Book title must be at least 3 characters long",
                        maxlength: "Book title can not be more than 50 characters long"
                    },
                    description: {
                        required: "Please enter book description",
                        minlength: "Book description must be at least 3 characters long",
                        maxlength: "Book description can not be more than 255 characters long"
                    },
                    author_id: {
                        required: "Please select author"
                    },
                    publisher_id: {
                        required: "Please select publisher"
                    },
                    publish_year: {
                        required: "Please enter publish year",
                        minlength: "Publish year must be 4 characters long",
                        maxlength: "Publish year can not be more than 4 characters long",
                        number: "Publish year must be a number"
                    },
                    price: {
                        required: "Please enter price",
                        minlength: "Price must be at least 1 characters long",
                        maxlength: "Price can not be more than 10 characters long",
                        number: "Price must be a number"
                    },
                    stock: {
                        required: "Please enter stock",
                        minlength: "Stock must be at least 1 characters long",
                        maxlength: "Stock can not be more than 10 characters long",
                        number: "Stock must be a number"
                    },
                    image: {
                        extension: "Image must be a jpg, jpeg, png or gif"
                    }

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

@endpush

@endsection
