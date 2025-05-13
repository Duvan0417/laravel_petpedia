@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Adopción</h1>
    <form action="{{ route('adoptions.update', $adoption) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">Usuario:</label>
            <select class="form-control" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $adoption->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pet_id">Animal:</label>
            <select class="form-control" name="pet_id" required>
                @foreach($pets as $pet)
                    <option value="{{ $pet->id }}" {{ $pet->id == $adoption->pet_id ? 'selected' : '' }}>{{ $pet->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="application_date">Fecha de Solicitud:</label>
            <input type="date" class="form-control" name="application_date" value="{{ $adoption->application_date }}" required>
        </div>
        <div class="form-group">
            <label for="status">Estado:</label>
            <input type="text" class="form-control" name="status" value="{{ $adoption->status }}" required>
        </div>
        <div class="form-group">
            <label for="comments">Comentarios:</label>
            <textarea class="form-control" name="comments">{{ $adoption->comments }}</textarea>
        </div>
        <div class="form-group">
            <label for="request_id">Solicitud:</label>
            <select class="form-control" name="request_id" required>
                @foreach($requests as $request)
                    <option value="{{ $request->id }}" {{ $request->id == $adoption->request_id ? 'selected' : '' }}>{{ $request->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="shelter_id">Refugio:</label>
            <select class="form-control" name="shelter_id" required>
                @foreach($shelters as $shelter)
                    <option value="{{ $shelter->id }}" {{ $shelter->id == $adoption->shelter_id ? 'selected' : '' }}>{{ $shelter->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('adoptions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
