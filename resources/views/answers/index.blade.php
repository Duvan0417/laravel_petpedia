@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Respuestas</h1>
    <a href="{{ route('answers.create') }}" class="btn btn-primary mb-3">Crear Respuesta</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Contenido</th>
                <th>Fecha de Creación</th>
                <th>Tema</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($answers as $answer)
            <tr>
                <td>{{ $answer->content }}</td>
                <td>{{ $answer->creation_date }}</td>
                <td>{{ $answer->topic->title ?? 'Sin tema' }}</td>
                <td>{{ $answer->user->name ?? 'Sin usuario' }}</td>
                <td>
                    <a href="{{ route('answers.show', $answer->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('answers.edit', $answer->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('answers.destroy', $answer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
