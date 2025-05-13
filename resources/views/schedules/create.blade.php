@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Horario</h1>
    
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="hour">Hora (0-23)</label>
            <input type="number" name="hour" id="hour" class="form-control" min="0" max="23" required>
        </div>
        
        <div class="form-group">
            <label for="location">Ubicación</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="service_id">Servicio (Opcional)</label>
            <select name="service_id" id="service_id" class="form-control">
                <option value="">Seleccione un servicio</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection