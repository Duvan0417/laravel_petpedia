



@extends('layouts.app')

@section('title', 'Create Forum')

@section('content')
    <h1>Create Forum</h1>
    <form action="{{ route('forums.store') }}" method="POST">
        @csrf
        <div class="mb-3">
    <label for="forum_name" class="form-label">Forum Name:</label>
    <input type="text" class="form-control" id="forum_name" name="forum_name" required>
</div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="creation_date" class="form-label">Creation Date:</label>
            <input type="date" class="form-control" id="creation_date" name="creation_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
