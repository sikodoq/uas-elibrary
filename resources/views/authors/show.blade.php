@extends('layouts.app')
@section('title', 'View Users')
@section('header', 'View User')
@section('menu', 'View')

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="container mt-4">
            <div>
                Name : {{ $user->name }}
            </div>
            <div>
                Email : {{ $user->email }}
            </div>
            <div>
                Role : {{ $user->role }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
            </i> Edit</a>
        <button class="btn btn-danger btn-sm" aria-label="Delete" type="submit"
            onclick="deleteAlert('{{ $user->id }}', 'Menghapus User {{ $user->name }}')"><i class="fas fa-trash">
            </i> Delete</button>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
            id="Delete{{ $user->id }}">
            @csrf
            @method('DELETE')
        </form>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-alt-circle-left"></i>
            Back</a>
    </div>
@endsection
