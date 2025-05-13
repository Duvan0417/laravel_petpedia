@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de la Notificación</h1>

    <div class="mb-3">
        <strong>Título:</strong>
        <p>{{ $notification->Title }}</p>
    </div>

    <div class="mb-3">
        <strong>Descripción:</strong>
        <p>{{ $notification->Description }}</p>
    </div>

    <div class="mb-3">
        <strong>Entrenador:</strong>
        <p>{{ $notification->trainer->name ?? 'No asignado' }}</p>
    </div>

    <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
