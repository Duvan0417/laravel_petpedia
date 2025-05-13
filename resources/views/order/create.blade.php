@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nueva Orden</h1>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        
        {{--
        <div class="mb-3">
            <label for="user_id" class="form-label">Cliente</label>
            <select class="form-select" id="user_id" name="user_id" required>
                <option value="" selected disabled>Seleccione un cliente</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div> --}}
        

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" step="0.01" min="0" class="form-control" id="total" name="total" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select class="form-select" id="status" name="status">
                <option value="pending" selected>Pendiente</option>
                <option value="completed">Completado</option>
                <option value="cancelled">Cancelado</option>
            </select>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('order.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">Crear Orden</button>
        </div>
    </form>
</div>
@endsection