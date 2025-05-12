@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Create New Service</h2>
    
    <form action="{{ route('services.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Service Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" min="0" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="duration" class="form-label">Duration</label>
                <input type="date" id="duration" name="duration" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" rows="1"></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="trainer_id" class="form-label">Trainer</label>
                <select id="trainer_id" name="trainer_id" class="form-select">
                    <option value="">Select Trainer</option>
                    @foreach($trainers as $trainer)
                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="veterinary_id" class="form-label">Veterinary</label>
                <select id="veterinary_id" name="veterinary_id" class="form-select">
                    <option value="">Select Veterinary</option>
                    @foreach($veterinaries as $veterinary)
                        <option value="{{ $veterinary->id }}">{{ $veterinary->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="request_id" class="form-label">Request</label>
                <select id="request_id" name="request_id" class="form-select">
                    <option value="">Select Request</option>
                    @foreach($requests as $request)
                        <option value="{{ $request->id }}">{{ $request->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('services.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Service</button>
        </div>
    </form>
</div>
@endsection