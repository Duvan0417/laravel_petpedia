@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pet</h1>
    
    <form action="{{ route('pets.update', $pet->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="specialty">Specialty</label>
            <input type="text" class="form-control" id="specialty" name="specialty" value="{{ $pet->specialty }}" required>
        </div>
        
        <div class="form-group">
            <label for="experience">Experience</label>
            <input type="number" class="form-control" id="experience" name="experience" value="{{ $pet->experience }}" required>
        </div>
        
        <div class="form-group">
            <label for="qualifications">Qualifications</label>
            <input type="number" step="0.01" class="form-control" id="qualifications" name="qualifications" value="{{ $pet->qualifications }}" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" step="0.01" class="form-control" id="phone" name="phone" value="{{ $pet->phone }}" required>
        </div>
        
        <div class="form-group">
            <label for="gmail">Email</label>
            <input type="email" class="form-control" id="gmail" name="gmail" value="{{ $pet->gmail }}" required>
        </div>
        
        <div class="form-group">
            <label for="biography">Biography</label>
            <textarea class="form-control" id="biography" name="biography" rows="3">{{ $pet->biography }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="trainer_id">Trainer</label>
            <select class="form-control" id="trainer_id" name="trainer_id">
                <option value="">Select Trainer</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}" {{ $pet->trainer_id == $trainer->id ? 'selected' : '' }}>{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="appointment_id">Appointment</label>
            <select class="form-control" id="appointment_id" name="appointment_id">
                <option value="">Select Appointment</option>
                @foreach($appointments as $appointment)
                    <option value="{{ $appointment->id }}" {{ $pet->appointment_id == $appointment->id ? 'selected' : '' }}>{{ $appointment->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="shelter_id">Shelter</label>
            <select class="form-control" id="shelter_id" name="shelter_id">
                <option value="">Select Shelter</option>
                @foreach($shelters as $shelter)
                    <option value="{{ $shelter->id }}" {{ $pet->shelter_id == $shelter->id ? 'selected' : '' }}>{{ $shelter->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="user_id">User</label>
            <select class="form-control" id="user_id" name="user_id">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $pet->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection