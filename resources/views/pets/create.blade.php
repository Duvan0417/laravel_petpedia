@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Create New Pet</h3>

    <form action="{{ route('pets.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="species">Species</label>
            <input type="text" name="species" id="species" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="breed">Breed</label>
            <input type="text" name="breed" id="breed" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="size">Size</label>
            <input type="number" step="0.01" name="size" id="size" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sex">Sex</label>
            <select name="sex" id="sex" class="form-control" required>
                <option value="">-- Select Sex --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('pets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
