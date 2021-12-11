@extends('layouts.app')
@section('title', 'View Member')
@section('header', 'View Member')
@section('menu', 'Member')

@section('content')
    {{-- Member show --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $member->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                @if ($member->image)
                                    <img src="{{ $member->Img }}" alt="{{ $member->name }}" class="img-thumbnail">

                                @else
                                    <img src="{{ asset('storage/images/members/no-image.png') }}"
                                        alt="{{ $member->name }}" class="img-thumbnail">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <p>
                                    <strong>Member Code :</strong> {{ $member->member_code }}
                                </p>
                                <p>
                                    <strong>Name :</strong> {{ $member->name }}
                                </p>
                                <p>
                                    <strong>Email :</strong> {{ $member->email }}
                                </p>
                                <p>
                                    <strong>Gender :</strong> {{ $member->gender }}
                                </p>
                                <p>
                                    <strong>Place/Birthdate :</strong> {{ $member->birthplace }},
                                    {{ $member->birthdate }}
                                </p>
                                <p>
                                    <strong>Phone :</strong> {{ $member->phone }}
                                </p>
                                <p>
                                    <strong>Address :</strong> {{ $member->address }} {{ $member->city }}
                                    {{ $member->province }} {{ $member->country }} {{ $member->postal_code }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-pencil-alt">
                                </i> Edit</a>
                            <button class="btn btn-danger btn-sm" aria-label="Delete" type="submit"
                                onclick="deleteAlert('{{ $member->id }}', 'Delete Member {{ $member->name }}')"><i
                                    class="fas fa-trash">
                                </i> Delete</button>
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                                class="d-inline" id="Delete{{ $member->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="{{ route('members.index') }}" class="btn btn-secondary btn-sm"><i
                                    class="fas fa-arrow-alt-circle-left"></i>
                                Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
