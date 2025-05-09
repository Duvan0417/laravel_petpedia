@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Services List</h2>

    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add New Service</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Trainer</th>
                <th>Veterinary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($services as $service)
            <tr>
                <td>{{ $service->name }}</td>
                <td>${{ number_format($service->price, 2) }}</td>
                <td>{{ $service->duration }}</td>
                <td>{{ $service->trainer->specialty ?? 'N/A' }}</td>
                <td>{{ $service->veterinary->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('services.show', $service->id) }}" class="btn btn-success btn-sm">Show</a>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete service?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
