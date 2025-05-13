@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pet Details</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pet->specialty }}</h5>
            <p class="card-text"><strong>Experience:</strong> {{ $pet->experience }}</p>
            <p class="card-text"><strong>Qualifications:</strong> {{ $pet->qualifications }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $pet->phone }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $pet->gmail }}</p>
            <p class="card-text"><strong>Biography:</strong> {{ $pet->biography }}</p>
            
            @if($pet->trainer)
                <p class="card-text"><strong>Trainer:</strong> {{ $pet->trainer->name }}</p>
            @endif
            
            @if($pet->appointment)
                <p class="card-text"><strong>Appointment:</strong> {{ $pet->appointment->name }}</p>
            @endif
            
            @if($pet->shelter)
                <p class="card-text"><strong>Shelter:</strong> {{ $pet->shelter->name }}</p>
            @endif
            
            @if($pet->user)
                <p class="card-text"><strong>User:</strong> {{ $pet->user->name }}</p>
            @endif
        </div>
    </div>
    
    <a href="{{ route('pets.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection