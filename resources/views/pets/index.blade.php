@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pets</h1>
    <a href="{{ route('pets.create') }}" class="btn btn-primary mb-3">Create New Pet</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Specialty</th>
                <th>Experience (years)</th>
                <th>Qualifications</th>
                <th>Phone</th>
                <th>Gmail</th>
                <th>Biography</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
            <tr>
                <td>{{ $pet->id }}</td>
                <td>{{ $pet->specialty }}</td>
                <td>{{ $pet->experience }}</td>
                <td>{{ $pet->qualifications }}</td>
                <td>{{ $pet->phone }}</td>
                <td>{{ $pet->gmail }}</td>
                <td>{{ Str::limit($pet->biography, 50) }}</td>
                <td>
                    <a href="{{ route('pets.show', $pet->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
