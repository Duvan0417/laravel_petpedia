@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Adopción</h1>
    <form action="{{ route('adoptions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">Usuario:</label>
            <select class="form-control" name="user_id" required>
                <option value="">Seleccione un Usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pet_id">Animal:</label>
            <select class="form-control" name="pet_id" required>
                <option value="">Seleccione un Animal</option>
                @foreach($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="application_date">Fecha de Solicitud:</label>
            <input type="date" class="form-control" name="application_date" required>
        </div>
        <div class="form-group">
            <label for="status">Estado:</label>
            <input type="text" class="form-control" name="status" required>
        </div>
        <div class="form-group">
            <label for="comments">Comentarios:</label>
            <textarea class="form-control" name="comments"></textarea>
        </div>
        <div class="form-group">
            <label for="request_id">Solicitud:</label>
            <select class="form-control" name="request_id" required>
                <option value="">Seleccione una Solicitud</option>
                @foreach($requests as $request)
                    <option value="{{ $request->id }}">{{ $request->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="shelter_id">Refugio:</label>
            <select class="form-control" name="shelter_id" required>
                <option value="">Seleccione un Refugio</option>
                @foreach($shelters as $shelter)
                    <option value="{{ $shelter->id }}">{{ $shelter->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('adoptions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
