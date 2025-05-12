@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Service Details</h1>
        <div class="btn-group">
            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('Are you sure you want to delete this service?')">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">{{ $service->name }}</h5>
                    <p class="card-text">{{ $service->description }}</p>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Price:</strong> ${{ number_format($service->price, 2) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Duration:</strong> {{ $service->duration->format('Y-m-d') }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6>Related Information</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Trainer:</strong> {{ $service->trainer->name ?? 'Not assigned' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Veterinary:</strong> {{ $service->veterinary->name ?? 'Not assigned' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Request:</strong> {{ $service->request->name ?? 'Not assigned' }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Services
        </a>
    </div>
</div>
@endsection