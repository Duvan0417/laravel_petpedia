@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Role Details</h3>

    <div class="card p-4">
        <p><strong>Name:</strong> {{ $role->name }}</p>
        <p><strong>Description:</strong> {{ $role->description }}</p>
        <p><strong>Trainer:</strong> {{ $role->trainer->specialty ?? 'N/A' }}</p>
        <p><strong>Shelter:</strong> {{ $role->shelter->name ?? 'N/A' }}</p>
        <p><strong>Veterinary:</strong> {{ $role->veterinary->name ?? 'N/A' }}</p>
        <p><strong>User:</strong> {{ $role->user->name ?? 'N/A' }}</p>
    </div>

    <a href="{{ route('roles.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
