@extends('layouts.app')
@section('title', 'Add Author')
@section('header', 'Add Author')
@section('menu', 'Add Author')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Entry Data Author') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" action="{{ route('authors.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="name"
                                placeholder="Enter Author Name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input value="{{ old('city') }}" type="text" name="city" class="form-control" id="city"
                                placeholder="Enter City" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input value="{{ old('country') }}" type="text" name="country" class="form-control"
                                id="country" placeholder="Enter Country" required>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('authors.index') }}" class="btn btn-danger">Back</a>
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
@endsection

@push('page_scripts')
    <script>
        $(function() {
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    city: {
                        required: true,
                        minlength: 3
                    },
                    country: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                        minlength: "Your name must consist of at least 3 characters"
                    },
                    city: {
                        required: "Please enter a city",
                        minlength: "Your city must consist of at least 3 characters"
                    },
                    country: {
                        required: "Please enter a country",
                        minlength: "Your country must consist of at least 3 characters"
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
