<!-- resources/views/topics/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Topic</h1>
    <form action="{{ route('topics.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
