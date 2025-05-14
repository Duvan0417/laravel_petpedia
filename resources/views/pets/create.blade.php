@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nueva Mascota</h1>

    <form action="{{ route('pets.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" required>
 required>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Edad</label>
            <input type="number" name="age" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="species" class="form-label">Especie</label>
            <input type="text" name="species" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="breed" class="form-label">Raza</label>
            <input type="text" name="breed" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="size" class="form-label">Tamaño (kg)</label>
            <input type="number" step="0.01" name="size" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="sex" class="form-label">Sexo</label>
            <select name="sex" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="gmail" class="form-label">Gmail</label>
            <input type="email" name="gmail" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="biography" class="form-label">Biografía</label>
            <textarea name="biography" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Mascota</button>
    </form>
</div>
@endsection