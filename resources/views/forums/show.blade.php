

@extends('layouts.app')

@section('title', 'Forum Details')

@section('content')
    <h1>Forum Details</h1>
    <p><strong>Forum name:</strong> {{ $forum->forum_name }}</p>
    <p><strong>Description:</strong> {{ $forum->description }}</p>
    <p><strong>Creation Date:</strong> {{ $forum->creation_date }}</p>
    <p><strong>User ID:</strong> {{ $forum->user_id }}</p>
    <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('forums.destroy', $forum->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
