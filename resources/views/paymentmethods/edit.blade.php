@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Método de Pago</h2>
    <form action="{{ route('paymentmethods.update', $paymentMethod->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $paymentMethod->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo de Pago</label>
            <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ $paymentMethod->type }}" required>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Detalles</label>
            <input type="text" name="details" id="details" class="form-control @error('details') is-invalid @enderror" value="{{ $paymentMethod->details }}" required>
            @error('details')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="issue_date" class="form-label">Fecha de Emisión</label>
            <input type="date" name="issue_date" id="issue_date" class="form-control @error('issue_date') is-invalid @enderror" value="{{ $paymentMethod->issue_date->format('Y-m-d') }}" required>
            @error('issue_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="CCV" class="form-label">CCV</label>
            <input type="number" name="CCV" id="CCV" class="form-control @error('CCV') is-invalid @enderror" value="{{ $paymentMethod->CCV }}" required>
            @error('CCV')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('paymentmethods.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
@endsection
