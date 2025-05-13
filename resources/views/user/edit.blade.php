@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Actualizar Usuario</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('user.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               name="name" id="name" 
                               value="{{ old('name', $user->name) }}" 
                               placeholder="Ej: Juan Pérez" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" id="email" 
                               value="{{ old('email', $user->email) }}" 
                               placeholder="Ej: ejemplo@dominio.com" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Nueva Contraseña (dejar en blanco para no cambiar)</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               name="password" id="password" 
                               placeholder="Mínimo 8 caracteres">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                        <input type="password" class="form-control" 
                               name="password_confirmation" id="password_confirmation" 
                               placeholder="Repite la nueva contraseña">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Actualizar Usuario
                    </button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection