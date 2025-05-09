@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0"><i class="fas fa-user-plus mr-2"></i> Create New Trainer</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('trainers.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="specialty" class="font-weight-bold">Specialty</label>
                                    <input type="text" name="specialty" id="specialty" 
                                           class="form-control @error('specialty') is-invalid @enderror" 
                                           value="{{ old('specialty') }}" required>
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
                                           value="{{ old('experience') }}" required>
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
                                           value="{{ old('qualifications') }}" required>
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
                                           value="{{ old('phone') }}" required>
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
                                   value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="biography" class="font-weight-bold">Biography</label>
                            <textarea name="biography" id="biography" rows="5"
                                      class="form-control @error('biography') is-invalid @enderror">{{ old('biography') }}</textarea>
                            @error('biography')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save mr-2"></i> Create Trainer
                            </button>
                            <a href="{{ route('trainers.index') }}" class="btn btn-outline-secondary btn-lg ml-2">
                                <i class="fas fa-arrow-left mr-2"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 10px;
    }
    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }
    .form-control {
        border-radius: 5px;
    }
    .btn-lg {
        padding: 0.5rem 1.5rem;
        font-size: 1.1rem;
    }
</style>
@endpush

