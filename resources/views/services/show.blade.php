@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Service Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $service->name }}</h5>
            <p><strong>Price:</strong> ${{ number_format($service->price, 2) }}</p>
            <p><strong>Duration:</strong> {{ $service->duration }}</p>
            <p><strong>Description:</strong> {{ $service->description }}</p>
            <p><strong>Trainer:</strong> {{ $service->trainer->specialty ?? 'N/A' }}</p>
            <p><strong>Veterinary:</strong> {{ $service->veterinary->name ?? 'N/A' }}</p>
            <p><strong>Request:</strong> {{ $service->request_id ?? 'N/A' }}</p>

            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
