@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Services</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add New Service</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Veterinarian</th>
                <th>Trainer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->name }}</td>
                <td>${{ number_format($service->price, 2) }}</td>
                <td>{{ \Carbon\Carbon::parse($service->duration)->format('Y-m-d') }}</td>

                <td>{{ $service->veterinarian->name ?? 'N/A' }}</td>
                <td>{{ $service->trainer->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('services.show', $service->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection