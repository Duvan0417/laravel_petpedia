@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Trainer Details</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $trainer->specialty }}</h5>
            <p class="card-text"><strong>Experience:</strong> {{ $trainer->experience }} years</p>
            <p class="card-text"><strong>Email:</strong> {{ $trainer->email }}</p>
            <p class="card-text"><strong>Biography:</strong> {{ $trainer->biography }}</p>
            
            <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection