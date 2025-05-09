@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Edit Service</h3>

    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $service->price }}" required>
        </div>

        <div class="form-group">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control" value="{{ $service->duration }}" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $service->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Trainer</label>
            <select name="trainer_id" class="form-control" required>
                <option value="">-- Select Trainer --</option>
                @foreach ($trainers as $trainer)
                    <option value="{{ $trainer->id }}" {{ $service->trainer_id == $trainer->id ? 'selected' : '' }}>
                        {{ $trainer->specialty }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Veterinary</label>
            <select name="veterinary_id" class="form-control" required>
                <option value="">-- Select Veterinary --</option>
                @foreach ($veterinarians as $vet)
                    <option value="{{ $vet->id }}" {{ $service->veterinary_id == $vet->id ? 'selected' : '' }}>
                        {{ $vet->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Request</label>
            <select name="request_id" class="form-control" required>
                <option value="">-- Select Request --</option>
                @foreach ($requests as $req)
                    <option value="{{ $req->id }}" {{ $service->request_id == $req->id ? 'selected' : '' }}>
                        Request #{{ $req->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
