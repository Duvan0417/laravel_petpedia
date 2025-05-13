@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Appointment Details</h1>
        <div class="btn-group">
            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('Are you sure you want to delete this appointment?')">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">
                        Status: 
                        <span class="badge bg-{{ $appointment->state === 'completed' ? 'success' : ($appointment->state === 'cancelled' ? 'danger' : 'warning') }}">
                            {{ ucfirst($appointment->state) }}
                        </span>
                    </h5>
                    <div class="mb-3">
                        <h6>Reason:</h6>
                        <p class="card-text">{{ $appointment->reason }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>Participants</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>User:</strong> {{ $appointment->user->name ?? 'Not assigned' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Veterinarian:</strong> {{ $appointment->veterinarian->name ?? 'Not assigned' }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('appointments.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Appointments
        </a>
    </div>
</div>
@endsection