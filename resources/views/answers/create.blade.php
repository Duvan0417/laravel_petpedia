@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Respuesta</h1>

    <form action="{{ route('answers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Contenido</label>
            <textarea name="content" class="form-control" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Fecha de Creación</label>
            <input type="date" name="creation_date" class="form-control" value="{{ old('creation_date') }}" required>
        </div>

        <div class="mb-3">
            <label>Tema</label>
            <select name="topic_id" class="form-control" required>
                @foreach($topics as $topic)
                    <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Usuario</label>
            <select name="users_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Crear</button>
        <a href="{{ route('answers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
