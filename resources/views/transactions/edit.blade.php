@extends('layouts.app')
@section('title', 'Extend')
@section('header', 'Extend')
@section('menu', 'Extend')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Book Extend') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" action="{{ route('transactions.update', $transaction->id) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="return_date">Extend Up To</label>
                            <input value="{{ $transaction->return_date }}" type="date" name="return_date"
                                class="form-control @error('return_date') is-invalid @enderror" id="return_date"
                                placeholder="Enter Return Date" required autofocus>
                            @error('return_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('transactions.index') }}" class="btn btn-danger">Back</a>
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
@endsection

@push('page_scripts')


@endpush

@endsection
