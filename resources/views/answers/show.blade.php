@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Respuesta</h1>

    <p><strong>Contenido:</strong> {{ $answer->content }}</p>
    <p><strong>Fecha de Creación:</strong> {{ $answer->creation_date }}</p>
    <p><strong>Tema:</strong> {{ $answer->topic->title ?? 'No asignado' }}</p>
    <p><strong>Usuario:</strong> {{ $answer->user->name ?? 'No asignado' }}</p>

    <a href="{{ route('answers.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
