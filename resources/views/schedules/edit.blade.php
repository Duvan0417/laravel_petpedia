@extends('layouts.app')

@section('title', 'Edit Schedule')

@section('content')
    <h1>Edit Schedule</h1>
    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $schedule->date }}" required>
        </div>
        <div class="mb-3">
            <label for="hour" class="form-label">Hour:</label>
            <input type="number" class="form-control" id="hour" name="hour" value="{{ $schedule->hour }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $schedule->location }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
