@extends('layouts.app')

@section('title', 'Forums')

@section('content')
    <h1>Forums</h1>
    <a href="{{ route('forums.create') }}" class="btn btn-primary mb-3">Create New Forum</a>
    <ul class="list-group">
        @foreach($forums as $forum)
            <li class="list-group-item">
                <a href="{{ route('forums.show', $forum->id) }}">{{ $forum->description }}</a>
            </li>
        @endforeach
    </ul>
@endsection
