@extends('layouts.app')

@section('title', 'Create Schedule')

@section('content')
    <h1>Create Schedule</h1>
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="hour" class="form-label">Hour:</label>
            <input type="number" class="form-control" id="hour" name="hour" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
      
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
