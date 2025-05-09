@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Edit Role</h3>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $role->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Trainer</label>
            <select name="trainer_id" class="form-control" required>
                <option value="">-- Select Trainer --</option>
                @foreach ($trainers as $trainer)
                    <option value="{{ $trainer->id }}" {{ $role->trainer_id == $trainer->id ? 'selected' : '' }}>
                        {{ $trainer->specialty }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Shelter</label>
            <select name="shelter_id" class="form-control" required>
                <option value="">-- Select Shelter --</option>
                @foreach ($shelters as $shelter)
                    <option value="{{ $shelter->id }}" {{ $role->shelter_id == $shelter->id ? 'selected' : '' }}>
                        {{ $shelter->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Veterinary</label>
            <select name="veterinary_id" class="form-control" required>
                <option value="">-- Select Veterinary --</option>
                @foreach ($veterinaries as $vet)
                    <option value="{{ $vet->id }}" {{ $role->veterinary_id == $vet->id ? 'selected' : '' }}>
                        {{ $vet->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>User</label>
            <select name="user_id" class="form-control">
                <option value="">-- Select User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $role->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
