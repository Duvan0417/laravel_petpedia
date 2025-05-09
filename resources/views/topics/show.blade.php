<!-- resources/views/topics/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $topic->title }}</h1>
    <p>{{ $topic->content }}</p>
    <a href="{{ route('topics.edit', $topic->id) }}">Edit</a>
    <form action="{{ route('topics.destroy', $topic->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
