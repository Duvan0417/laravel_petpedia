@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Roles List</h3>

    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create Role</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Trainer</th>
                <th>Shelter</th>
                <th>Veterinary</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>{{ $role->trainer->specialty ?? 'N/A' }}</td>
                    <td>{{ $role->shelter->name ?? 'N/A' }}</td>
                    <td>{{ $role->veterinary->name ?? 'N/A' }}</td>
                    <td>{{ $role->user->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
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
