@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Create New Role</h3>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label>Trainer</label>
            <select name="trainer_id" class="form-control" required>
                <option value="">-- Select Trainer --</option>
                @foreach ($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->specialty }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Shelter</label>
            <select name="shelter_id" class="form-control" required>
                <option value="">-- Select Shelter --</option>
                @foreach ($shelters as $shelter)
                    <option value="{{ $shelter->id }}">{{ $shelter->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Veterinary</label>
            <select name="veterinary_id" class="form-control" required>
                <option value="">-- Select Veterinary --</option>
                @foreach ($veterinaries as $vet)
                    <option value="{{ $vet->id }}">{{ $vet->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>User</label>
            <select name="user_id" class="form-control">
                <option value="">-- Select User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
