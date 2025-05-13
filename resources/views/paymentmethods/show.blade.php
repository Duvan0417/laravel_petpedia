@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Detalles de la Solicitud</h2>
             <div class="row mb-3">
    <div class="col-md-4 fw-bold">Usuario:</div>
    <div class="col-md-8">
        {{ $paymentMethod->user ? $paymentMethod->user->name : 'No asignado' }}
    </div>
</div>


<div class="row mb-3">
    <div class="col-md-4 fw-bold">Tipo:</div>
    <div class="col-md-8">{{ $paymentMethod->type }}</div>
</div>

<div class="row mb-3">
    <div class="col-md-4 fw-bold">Detalles:</div>
    <div class="col-md-8">{{ $paymentMethod->details }}</div>
</div>

<div class="row mb-3">
    <div class="col-md-4 fw-bold">Fecha de Emisión:</div>
    <div class="col-md-8">{{ \Carbon\Carbon::parse($paymentMethod->issue_date)->format('d/m/Y') }}</div>
</div>

<div class="row mb-3">
    <div class="col-md-4 fw-bold">CCV:</div>
    <div class="col-md-8">{{ $paymentMethod->CCV }}</div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection