@extends('layouts.app')

@section('title', 'Detalles del Usuario')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detalles del Usuario</h5>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4 fw-bold">Nombre:</div>
            <div class="col-md-8">{{ $user->name }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 fw-bold">Email:</div>
            <div class="col-md-8">{{ $user->email }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 fw-bold">Teléfono:</div>
            <div class="col-md-8">{{ $user->phone }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 fw-bold">Fecha de Registro:</div>
            <div class="col-md-8">{{ $user->registration_date?->format('d/m/Y') ?? 'N/A' }}</div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
