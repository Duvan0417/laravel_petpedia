@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Trainer Details</h1>
        <div class="btn-group">
            <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('Are you sure you want to delete this trainer?')">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">{{ $trainer->specialty }}</h3>
                    <p class="text-muted">{{ $trainer->experience }} years of experience</p>
                    <div class="mb-3">
                        <span class="badge bg-primary rounded-pill">
                            Rating: {{ number_format($trainer->rating, 1) }}/5
                        </span>
                    </div>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Phone:</strong> {{ $trainer->phone }}
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ $trainer->email }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Biography</h5>
                    <p class="card-text">{{ $trainer->biography }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('trainers.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Trainers
        </a>
    </div>
</div>
@endsection