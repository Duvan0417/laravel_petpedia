@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Orden #{{ $order->id }}</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('order.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')


                    {{--
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Cliente</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" 
                                    {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>--}}

                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" min="0" class="form-control" 
                                   id="total" name="total" 
                                   value="{{ old('total', $order->total) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Estado</label>
                        <select class="form-select" id="status" name="status">
                            <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>
                                Pendiente
                            </option>
                            <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>
                                Completado
                            </option>
                            <option value="cancelled" {{ old('status', $order->status) == 'cancelled' ? 'selected' : '' }}>
                                Cancelado
                            </option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('order.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Regresar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection