@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Trainer</h2>
    
    <form action="{{ route('trainers.update', $trainer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="specialty" class="form-label">Specialty</label>
                <input type="text" id="specialty" name="specialty" class="form-control" 
                       value="{{ old('specialty', $trainer->specialty) }}" required>
            </div>
            <div class="col-md-6">
                <label for="experience" class="form-label">Experience (years)</label>
                <input type="number" id="experience" name="experience" class="form-control" 
                       value="{{ old('experience', $trainer->experience) }}" min="0" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="rating" class="form-label">Rating (0-5)</label>
                <input type="number" id="rating" name="rating" class="form-control" 
                       value="{{ old('rating', $trainer->rating) }}" step="0.1" min="0" max="5" required>
            </div>
            <div class="col-md-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" id="phone" name="phone" class="form-control" 
                       value="{{ old('phone', $trainer->phone) }}" required>
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" 
                       value="{{ old('email', $trainer->email) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="biography" class="form-label">Biography</label>
            <textarea id="biography" name="biography" class="form-control" rows="4" required>
                {{ old('biography', $trainer->biography) }}
            </textarea>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('trainers.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Trainer</button>
        </div>
    </form>
</div>
@endsection