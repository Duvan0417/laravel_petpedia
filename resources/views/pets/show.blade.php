@extends('layouts.app')

@section('title', 'Detalles de Mascota')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de {{ $pet->name }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $pet->name }}</p>
            <p><strong>Edad:</strong> {{ $pet->age }} años</p>
            <p><strong>Especie:</strong> {{ $pet->species }}</p>
            <p><strong>Raza:</strong> {{ $pet->breed }}</p>
            <p><strong>Tamaño:</strong> {{ number_format($pet->size, 2) }} kg</p>
            <p><strong>Sexo:</strong> {{ $pet->sex }}</p>
            <p><strong>Correo Gmail:</strong> {{ $pet->gmail }}</p>
            <p><strong>Descripción:</strong> {{ $pet->description ?? 'N/A' }}</p>
            <p><strong>Biografía:</strong> {{ $pet->biography ?? 'N/A' }}</p>
            <p><strong>Entrenador:</strong> {{ $pet->trainer->name ?? 'No asignado' }}</p>
            <p><strong>Usuario:</strong> {{ $pet->user->name ?? 'No asignado' }}</p>
            <p><strong>Refugio:</strong> {{ $pet->shelter->name ?? 'No asignado' }}</p>
            <p><strong>Cita:</strong> {{ $pet->appointment->date ?? 'No asignada' }}</p>
        </div>
    </div>

    <a href="{{ route('pets.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection