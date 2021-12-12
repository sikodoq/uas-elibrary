@extends('layouts.app')
@section('title', 'Add Transaction')
@section('header', 'Add Transaction')
@section('menu', 'Add Transaction')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Transaction Data Entry') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" action="{{ route('transactions.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="transaction_code">Transaction Code</label>
                            <input value="{{ old('transaction_code') }}" type="text" name="transaction_code"
                                class="form-control @error('transaction_code') is-invalid @enderror" id="transaction_code"
                                placeholder="Enter Transaction Code" required autofocus>
                            @error('transaction_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Select members --}}
                        <div class="form-group">
                            <label for="member_id">Member</label>
                            <select name="member_id" id="member_id"
                                class="form-control @error('member_id') is-invalid @enderror">
                                <option value="">Select Member</option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                            @error('member_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- select books --}}
                        <div class="form-group">
                            <label for="book_id">Book</label>
                            <select name="book_id" id="book_id" class="form-control @error('book_id') is-invalid @enderror">
                                <option value="">Select Book</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{-- borrow date --}}
                                <div class="form-group">
                                    <label for="borrow_date">Borrow Date</label>
                                    <input value="{{ old('borrow_date') }}" type="date" name="borrow_date"
                                        class="form-control @error('borrow_date') is-invalid @enderror" id="borrow_date"
                                        placeholder="Enter Borrow Date" required>
                                    @error('borrow_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- return date --}}
                                <div class="form-group">
                                    <label for="return_date">Return Date</label>
                                    <input value="{{ old('return_date') }}" type="date" name="return_date"
                                        class="form-control @error('return_date') is-invalid @enderror" id="return_date"
                                        placeholder="Enter Return Date" required>
                                    @error('return_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
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
