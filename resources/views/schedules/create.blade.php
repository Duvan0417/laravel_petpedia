@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Crear Nuevo Horario</h2>
    
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="hour" class="form-label">Hora</label>
                <select id="hour" name="hour" class="form-select" required>
                    @for($i = 0; $i < 24; $i++)
                        <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Ubicación</label>
            <input type="text" id="location" name="location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="service_id" class="form-label">Servicio</label>
            <select id="service_id" name="service_id" class="form-select">
                <option value="" selected>Seleccione un servicio</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('schedules.index') }}" class="btn btn-outline-secondary me-md-2">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar Horario</button>
        </div>
    </form>
</div>

<style>
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .form-control, .form-select {
        border-radius: 0.375rem;
    }
</style>
@endsection