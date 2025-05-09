@extends('layouts.app')

@section('title', 'Edit Forum')

@section('content')
    <h1>Edit Forum</h1>
    <form action="{{ route('forums.update', $forum->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $forum->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="creation_date" class="form-label">Creation Date:</label>
            <input type="date" class="form-control" id="creation_date" name="creation_date" value="{{ $forum->creation_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
