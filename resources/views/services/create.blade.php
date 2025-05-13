@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Service</h1>
    
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Service Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        
        <div class="form-group">
            <label for="duration">Duration Date</label>
            <input type="date" class="form-control" id="duration" name="duration" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        
        <div class="form-group">
            <label for="veterinarian_id">Veterinarian</label>
            <select class="form-control" id="veterinarian_id" name="veterinarian_id">
                <option value="">Select Veterinarian</option>
                @foreach($veterinarians as $veterinarian)
                    <option value="{{ $veterinarian->id }}">{{ $veterinarian->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="trainer_id">Trainer</label>
            <select class="form-control" id="trainer_id" name="trainer_id">
                <option value="">Select Trainer</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="request_id">Request</label>
            <select class="form-control" id="request_id" name="request_id">
                <option value="">Select Request</option>
                @foreach($requests as $request)
                    <option value="{{ $request->id }}">{{ $request->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection