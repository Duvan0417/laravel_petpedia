@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Edit Pet</h3>

    <form action="{{ route('pets.update', $pet) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $pet->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Age</label>
            <input type="number" name="age" value="{{ $pet->age }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Species</label>
            <input type="text" name="species" value="{{ $pet->species }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Breed</label>
            <input type="text" name="breed" value="{{ $pet->breed }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Size</label>
            <input type="number" step="0.01" name="size" value="{{ $pet->size }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Sex</label>
            <input type="text" name="sex" value="{{ $pet->sex }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $pet->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
