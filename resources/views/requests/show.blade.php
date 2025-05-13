@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Detalles de la Solicitud</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Usuario:</div>
                        <div class="col-md-8">{{ $request->user->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Refugio:</div>
                        <div class="col-md-8">{{ $request->shelter->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Servicio:</div>
                        <div class="col-md-8">{{ $request->service->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Fecha y Hora:</div>
                        <div class="col-md-8">{{ $request->date->format('d/m/Y H:i') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Prioridad:</div>
                        <div class="col-md-8">
                            <span class="badge bg-{{ $request->priority == 1 ? 'danger' : ($request->priority == 2 ? 'warning' : 'primary') }}">
                                {{ $request->priority == 1 ? 'Alta' : ($request->priority == 2 ? 'Media' : 'Baja') }}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Estado:</div>
                        <div class="col-md-8">{{ ucfirst(str_replace('_', ' ', $request->solicitation_status)) }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Cita Asociada:</div>
                        <div class="col-md-8">
                            @if($request->appointment)
                                {{ $request->appointment->date->format('d/m/Y H:i') }}
                            @else
                                No tiene cita asociada
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('requests.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                        <div>
                            <a href="{{ route('requests.edit', $request->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection