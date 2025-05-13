@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Create New Appointment</h2>
    
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="state" class="form-label">State</label>
                <select id="state" name="state" class="form-select" required>
                    <option value="">Select State</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="reason" class="form-label">Reason</label>
            <textarea id="reason" name="reason" class="form-control" rows="3" required></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="user_id" class="form-label">User</label>
                <select id="user_id" name="user_id" class="form-select">
                    <option value="">Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="veterinarian_id" class="form-label">Veterinarian</label>
                <select id="veterinarian_id" name="veterinarian_id" class="form-select">
                    <option value="">Select Veterinarian</option>
                    @foreach($veterinarians as $veterinarian)
                        <option value="{{ $veterinarian->id }}">{{ $veterinarian->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('appointments.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Appointment</button>
        </div>
    </form>
</div>
@endsection