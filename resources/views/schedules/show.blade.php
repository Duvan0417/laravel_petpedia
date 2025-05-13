@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Horario</h1>
    
    <div class="card mb-4">
        <div class="card-body">
          <p class="card-text"><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</p>
 <p class="card-text"><strong>Hora:</strong> {{ $schedule->hour }}:00</p>
            <p class="card-text"><strong>Ubicación:</strong> {{ $schedule->location }}</p>
            <p class="card-text"><strong>Servicio:</strong> {{ $schedule->service->name ?? 'No asignado' }}</p>
        </div>
    </div>
    
    <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection