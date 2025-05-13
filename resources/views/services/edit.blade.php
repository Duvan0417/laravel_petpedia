<!-- resources/views/services/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Service</h1>

        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $service->price }}" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" value="{{ $service->duration }}" required>
            </div>

            <div class="form-group">
                <label for="veterinarian_name">Veterinarian Name</label>
                <input type="text" class="form-control" id="veterinarian_name" name="veterinarian_name" value="{{ $service->veterinarian_name }}" required>
            </div>

            <div class="form-group">
                <label for="trainer_name">Trainer Name</label>
                <input type="text" class="form-control" id="trainer_name" name="trainer_name" value="{{ $service->trainer_name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
