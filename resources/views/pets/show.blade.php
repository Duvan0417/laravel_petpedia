@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Pet Details</h3>

    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $pet->name }}</p>
            <p><strong>Age:</strong> {{ $pet->age }}</p>
            <p><strong>Species:</strong> {{ $pet->species }}</p>
            <p><strong>Breed:</strong> {{ $pet->breed }}</p>
            <p><strong>Size:</strong> {{ $pet->size }}</p>
            <p><strong>Sex:</strong> {{ $pet->sex }}</p>
            <p><strong>Description:</strong><br>{{ $pet->description }}</p>
        </div>
    </div>

    <a href="{{ route('pets.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
