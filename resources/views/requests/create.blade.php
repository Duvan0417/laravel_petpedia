@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Crear Nueva Solicitud</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('requests.store') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="user_id">Usuario</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                                <option value="">Seleccionar Usuario</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="shelter_id">Refugio</label>
                            <select class="form-control @error('shelter_id') is-invalid @enderror" id="shelter_id" name="shelter_id" required>
                                <option value="">Seleccionar Refugio</option>
                                @foreach($shelters as $shelter)
                                    <option value="{{ $shelter->id }}" {{ old('shelter_id') == $shelter->id ? 'selected' : '' }}>
                                        {{ $shelter->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('shelter_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="services_id">Servicio</label>
                            <select class="form-control @error('services_id') is-invalid @enderror" id="services_id" name="services_id" required>
                                <option value="">Seleccionar Servicio</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('services_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('services_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="date">Fecha y Hora</label>
                            <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="priority">Prioridad</label>
                            <select class="form-control @error('priority') is-invalid @enderror" id="priority" name="priority" required>
                                <option value="1" {{ old('priority') == 1 ? 'selected' : '' }}>Alta</option>
                                <option value="2" {{ old('priority') == 2 ? 'selected' : '' }}>Media</option>
                                <option value="3" {{ old('priority') == 3 ? 'selected' : '' }}>Baja</option>
                            </select>
                            @error('priority')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="solicitation_status">Estado</label>
                            <select class="form-control @error('solicitation_status') is-invalid @enderror" id="solicitation_status" name="solicitation_status" required>
                                <option value="pendiente" {{ old('solicitation_status') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="en_proceso" {{ old('solicitation_status') == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                                <option value="completada" {{ old('solicitation_status') == 'completada' ? 'selected' : '' }}>Completada</option>
                                <option value="cancelada" {{ old('solicitation_status') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                            </select>
                            @error('solicitation_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="appointment_id">Cita Asociada</label>
                            <select class="form-control @error('appointment_id') is-invalid @enderror" id="appointment_id" name="appointment_id">
                                <option value="">Sin cita asociada</option>
                                @foreach($appointments as $appointment)
                                    <option value="{{ $appointment->id }}" {{ old('appointment_id') == $appointment->id ? 'selected' : '' }}>
                                        {{ $appointment->date->format('d/m/Y H:i') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('appointment_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('requests.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection