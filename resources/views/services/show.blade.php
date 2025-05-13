<!-- resources/views/services/view.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>View Service</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $service->name }}</h5>
                <p class="card-text"><strong>Price:</strong> {{ $service->price }}</p>
                <p class="card-text"><strong>Duration:</strong> {{ $service->duration }}</p>
                <p class="card-text"><strong>Veterinarian Name:</strong> {{ $service->veterinarian_name }}</p>
                <p class="card-text"><strong>Trainer Name:</strong> {{ $service->trainer_name }}</p>
            </div>
        </div>

        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
