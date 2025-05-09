@extends('layouts.app')

@section('title', 'Schedule Details')

@section('content')
    <h1>Schedule Details</h1>
    <p><strong>Date:</strong> {{ $schedule->date }}</p>
    <p><strong>Hour:</strong> {{ $schedule->hour }}</p>
    <p><strong>Location:</strong> {{ $schedule->location }}</p>
    <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
