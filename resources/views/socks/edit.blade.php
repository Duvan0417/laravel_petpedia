@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Sock</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay algunos problemas con tu entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('socks.update', $sock->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Guy" class="form-label">Guy</label>
            <input type="text" name="Guy" class="form-control" value="{{ old('Guy', $sock->Guy) }}" required>
        </div>

        <div class="mb-3">
            <label for="URL" class="form-label">URL</label>
            <input type="url" name="URL" class="form-control" value="{{ old('URL', $sock->URL) }}" required>
        </div>

        <div class="mb-3">
            <label for="Upload_Date" class="form-label">Fecha de Subida</label>
            <input type="date" name="Upload_Date" class="form-control" value="{{ old('Upload_Date', $sock->Upload_Date) }}" required>
        </div>

        <div class="mb-3">
            <label for="users_id" class="form-label">Usuario</label>
            <select name="users_id" class="form-select" required>
                <option value="">-- Selecciona un usuario --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $sock->users_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Sock</button>
        <a href="{{ route('socks.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
