@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Trainer List</h2>

    <a href="{{ route('trainers.index') }}" class="btn btn-secondary mb-3">Refresh</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Specialty</th>
                <th>Experience</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($trainers as $trainer)
            <tr>
                <td>{{ $trainer->specialty }}</td>
                <td>{{ $trainer->experience }} years</td>
                <td>{{ $trainer->email }}</td>
                <td>
                    <a href="{{ route('trainers.show', $trainer->id) }}" class="btn btn-success btn-sm">Show</a>
                    <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete trainer?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
