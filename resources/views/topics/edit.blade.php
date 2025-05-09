<!-- resources/views/topics/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Topic</h1>
    <form action="{{ route('topics.update', $topic->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $topic->title }}" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ $topic->content }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
