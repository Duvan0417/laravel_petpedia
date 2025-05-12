@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Actualizar Horario</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('schedules.update', $schedule) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="date" class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="date" id="date" 
                               value="{{ old('date', $schedule->date->format('Y-m-d')) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="hour" class="form-label">Hora</label>
                        <select id="hour" name="hour" class="form-select" required>
                            @for($i = 0; $i < 24; $i++)
                                <option value="{{ $i }}" {{ $schedule->hour == $i ? 'selected' : '' }}>
                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Ubicación</label>
                    <input type="text" class="form-control" name="location" id="location" 
                           value="{{ old('location', $schedule->location) }}" required>
                </div>

                <div class="mb-3">
                    <label for="service_id" class="form-label">Servicio</label>
                    <select id="service_id" name="service_id" class="form-select">
                        <option value="">Seleccione un servicio</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" 
                                {{ $schedule->service_id == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('schedules.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Actualizar Horario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-label {
        font-weight: 500;
    }
</style>
@endsection