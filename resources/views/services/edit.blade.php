@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="fas fa-edit mr-2"></i>Edit Service</h3>
        </div>
        
        <div class="card-body">
            <form action="{{ route('services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Service Name</label>
                            <input type="text" name="name" id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $service->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="font-weight-bold">Price</label>
                            <input type="number" step="0.01" name="price" id="price" 
                                   class="form-control @error('price') is-invalid @enderror" 
                                   value="{{ old('price', $service->price) }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="duration" class="font-weight-bold">Duration</label>
                    <input type="text" name="duration" id="duration" 
                           class="form-control @error('duration') is-invalid @enderror" 
                           value="{{ old('duration', $service->duration) }}" required>
                    @error('duration')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="font-weight-bold">Description</label>
                    <textarea name="description" id="description" rows="3"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="trainer_id" class="font-weight-bold">Trainer</label>
                            <select name="trainer_id" id="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror" required>
                                <option value="">-- Select Trainer --</option>
                                @foreach($trainers as $trainer)
                                    <option value="{{ $trainer->id }}" {{ old('trainer_id', $service->trainer_id) == $trainer->id ? 'selected' : '' }}>
                                        {{ $trainer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('trainer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="veterinarian_id" class="font-weight-bold">Veterinarian</label>
                            <select name="veterinarian_id" id="veterinarian_id" class="form-control @error('veterinarian_id') is-invalid @enderror" required>
                                <option value="">-- Select Veterinarian --</option>
                                @foreach($veterinarians as $vet)
                                    <option value="{{ $vet->id }}" {{ old('veterinarian_id', $service->veterinarian_id) == $vet->id ? 'selected' : '' }}>
                                        {{ $vet->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('veterinarian_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="request_id" class="font-weight-bold">Request</label>
                            <select name="request_id" id="request_id" class="form-control @error('request_id') is-invalid @enderror" required>
                                <option value="">-- Select Request --</option>
                                @foreach($requests as $req)
                                    <option value="{{ $req->id }}" {{ old('request_id', $service->request_id) == $req->id ? 'selected' : '' }}>
                                        Request #{{ $req->id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('request_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div> -->

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save mr-2"></i> Update Service
                    </button>
                    <a href="{{ route('services.index') }}" class="btn btn-outline-secondary btn-lg ml-2">
                        <i class="fas fa-times mr-2"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection