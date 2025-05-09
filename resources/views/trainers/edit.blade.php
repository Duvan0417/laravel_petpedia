@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Edit Trainer</h3>
    <form action="{{ route('trainers.update', $trainer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Formulario completo aquí -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="specialty" class="font-weight-bold">Specialty</label>
                    <input type="text" name="specialty" id="specialty" 
                           class="form-control @error('specialty') is-invalid @enderror" 
                           value="{{ old('specialty', $trainer->specialty) }}" required>
                    @error('specialty')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="experience" class="font-weight-bold">Experience (years)</label>
                    <input type="number" name="experience" id="experience" 
                           class="form-control @error('experience') is-invalid @enderror" 
                           value="{{ old('experience', $trainer->experience) }}" required>
                    @error('experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="qualifications" class="font-weight-bold">Qualifications</label>
                    <input type="number" step="0.01" name="qualifications" id="qualifications" 
                           class="form-control @error('qualifications') is-invalid @enderror" 
                           value="{{ old('qualifications', $trainer->qualifications) }}" required>
                    @error('qualifications')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone" class="font-weight-bold">Phone Number</label>
                    <input type="text" name="phone" id="phone" 
                           class="form-control @error('phone') is-invalid @enderror" 
                           value="{{ old('phone', $trainer->phone) }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="font-weight-bold">Email</label>
            <input type="email" name="email" id="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email', $trainer->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="biography" class="font-weight-bold">Biography</label>
            <textarea name="biography" id="biography" rows="5"
                      class="form-control @error('biography') is-invalid @enderror">{{ old('biography', $trainer->biography) }}</textarea>
            @error('biography')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group text-right mt-4">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save mr-2"></i> Update Trainer
            </button>
            <a href="{{ route('trainers.index') }}" class="btn btn-outline-secondary btn-lg ml-2">
                <i class="fas fa-arrow-left mr-2"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
