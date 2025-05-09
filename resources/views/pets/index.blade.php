@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Pet List</h3>
    <a href="{{ route('pets.create') }}" class="btn btn-primary mb-3">Add New Pet</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Species</th>
                <th>Breed</th>
                <th>Size</th>
                <th>Sex</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet)
                <tr>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->age }}</td>
                    <td>{{ $pet->species }}</td>
                    <td>{{ $pet->breed }}</td>
                    <td>{{ $pet->size }}</td>
                    <td>{{ $pet->sex }}</td>
                    <td>{{ Str::limit($pet->description, 50) }}</td>
                    <td>
                        <a href="{{ route('pets.show', $pet) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('pets.edit', $pet) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pets.destroy', $pet) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
