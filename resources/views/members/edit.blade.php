@extends('layouts.app')
@section('title', 'Edit Member')
@section('header', 'Edit Member')
@section('menu', 'Edit Member')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Member Data Edit') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" action="{{ route('members.update', $member->id) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        {{-- member code --}}
                        <div class="form-group">
                            <label for="member_code">{{ __('Member Code') }}</label>
                            <input type="text" name="member_code" id="member_code"
                                class="form-control @error('member_code') is-invalid @enderror" placeholder="Member Code"
                                value="{{ $member->member_code }}" autofocus>
                            @error('member_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- member name --}}
                        <div class="form-group">
                            <label for="name">{{ __('Full Name') }}</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Full Name"
                                value="{{ $member->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- member email --}}
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                value="{{ $member->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- select gender --}}
                        <div class="form-group">
                            <label for="gender">{{ __('Gender') }}</label>
                            <select name="gender" id="gender" class="form-control  @error('gender') is-invalid @enderror">
                                <option value="">Choose</option>
                                <option value="Male" @if ($member->gender == 'Male') {{ 'selected' }} @endif>Male</option>
                                <option value="Female" @if ($member->gender == 'Female') {{ 'selected' }} @endif>Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- member phone --}}
                        <div class="form-group">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"
                                value="{{ $member->phone }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{-- member birthplace --}}
                                <div class="form-group">
                                    <label for="birthplace">{{ __('Birthplace') }}</label>
                                    <input type="text" name="birthplace" id="birthplace" class="form-control"
                                        placeholder="Birthplace" value="{{ $member->birthplace }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- member birthdate --}}
                                <div class="form-group">
                                    <label for="birthdate">{{ __('Birthdate') }}</label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control"
                                        value="{{ $member->birthdate }}">
                                </div>
                            </div>
                        </div>
                        {{-- select religion with old value --}}

                        <div class="form-group">
                            <label for="religion">{{ __('Select Religion') }}</label>
                            <select name="religion" id="religion"
                                class="form-control @error('religion') is-invalid @enderror">
                                <option value="">Choose</option>
                                <option value="Islam" @if ($member->religion == 'Islam') {{ 'selected' }} @endif>Islam</option>
                                <option value="Kristen" @if ($member->religion == 'Kristen') {{ 'selected' }} @endif>Kristen</option>
                                <option value="Katolik" @if ($member->religion == 'Katolik') {{ 'selected' }} @endif>Katolik</option>
                                <option value="Hindu" @if ($member->religion == 'Hindu') {{ 'selected' }} @endif>Hindu</option>
                                <option value="Buddha" @if ($member->religion == 'Buddha') {{ 'selected' }} @endif>Buddha</option>
                                <option value="Konghucu" @if ($member->religion == 'Konghucu') {{ 'selected' }} @endif>Konghucu</option>
                            </select>
                            @error('religion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- textarea member address --}}
                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <textarea name="address" id="address" cols="30" rows="3"
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Address">{{ $member->address }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{-- member city --}}
                                <div class="form-group">
                                    <label for="city">{{ __('City') }}</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="City"
                                        value="{{ $member->city }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- member zipcode --}}
                                <div class="form-group">
                                    <label for="postal_code">{{ __('Postal Code') }}</label>
                                    <input type="text" name="postal_code" id="postal_code" class="form-control"
                                        placeholder="Postal Code" value="{{ $member->postal_code }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{-- member province --}}
                                <div class="form-group">
                                    <label for="province">{{ __('Province') }}</label>
                                    <input type="text" name="province" id="province" class="form-control"
                                        placeholder="Province" value="{{ $member->province }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- member country --}}
                                <div class="form-group">
                                    <label for="country">{{ __('Country') }}</label>
                                    <input type="text" name="country" id="country" class="form-control"
                                        placeholder="Country" value="{{ $member->country }}">
                                </div>
                            </div>
                        </div>
                        {{-- select member status --}}
                        <div class="form-group">
                            <label for="status">{{ __('Status') }}</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Choose</option>
                                <option value="1" @if ($member->status == '1') {{ 'selected' }} @endif>Active</option>
                                <option value="0" @if ($member->status == '0') {{ 'selected' }} @endif>Inactive</option>
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('members.index') }}" class="btn btn-danger">Back</a>
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
