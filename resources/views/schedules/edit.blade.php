@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Horario</h1>
    
    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ \Carbon\Carbon::parse($schedule->date)->format('Y-m-d') }}" required>
  </div>
        
        <div class="form-group">
            <label for="hour">Hora (0-23)</label>
            <input type="number" name="hour" id="hour" class="form-control" min="0" max="23" value="{{ $schedule->hour }}" required>
        </div>
        
        <div class="form-group">
            <label for="location">Ubicación</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $schedule->location }}" required>
        </div>
        
        <div class="form-group">
            <label for="service_id">Servicio (Opcional)</label>
            <select name="service_id" id="service_id" class="form-control">
                <option value="">Sin servicio</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $schedule->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection