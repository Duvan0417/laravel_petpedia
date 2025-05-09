@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Create New Service</h3>

    <form action="{{ route('services.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>
        
        <div class="form-group">
            <label>Trainer</label>
            <select name="trainer_id" class="form-control" required>
                <option value="">-- Select trainer --</option>
                @foreach ($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Veterinary</label>
            <select name="veterinary_id" class="form-control" required>
                <option value="">-- Select Veterinary --</option>
                @foreach ($veterinarians as $vet)
                    <option value="{{ $vet->id }}">{{ $vet->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Request</label>
            <select name="request_id" class="form-control" required>
                <option value="">-- Select Request --</option>
                @foreach ($requests as $req)
                    <option value="{{ $req->id }}">Request #{{ $req->id }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
