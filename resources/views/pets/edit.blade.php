@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Mascota</h1>
    
    <form action="{{ route('pets.update', $pet->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pet->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="species">Especie</label>
                    <select class="form-control" id="species" name="species" required>
                        <option value="Perro" {{ $pet->species == 'Perro' ? 'selected' : '' }}>Perro</option>
                        <option value="Gato" {{ $pet->species == 'Gato' ? 'selected' : '' }}>Gato</option>
                        <option value="Ave" {{ $pet->species == 'Ave' ? 'selected' : '' }}>Ave</option>
                        <option value="Roedor" {{ $pet->species == 'Roedor' ? 'selected' : '' }}>Roedor</option>
                        <option value="Reptil" {{ $pet->species == 'Reptil' ? 'selected' : '' }}>Reptil</option>
                        <option value="Otro" {{ $pet->species == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="breed">Raza</label>
                    <input type="text" class="form-control" id="breed" name="breed" value="{{ old('breed', $pet->breed) }}" required>
                </div>

                <div class="form-group">
                    <label for="age">Edad (años)</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $pet->age) }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="size">Tamaño (kg)</label>
                    <input type="number" step="0.01" class="form-control" id="size" name="size" value="{{ old('size', $pet->size) }}" required>
                </div>

                <div class="form-group">
                    <label for="sex">Sexo</label>
                    <select class="form-control" id="sex" name="sex" required>
                        <option value="Macho" {{ $pet->sex == 'Macho' ? 'selected' : '' }}>Macho</option>
                        <option value="Hembra" {{ $pet->sex == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gmail">Correo de contacto</label>
                    <input type="email" class="form-control" id="gmail" name="gmail" value="{{ old('gmail', $pet->gmail) }}" required>
                </div>

                <div class="form-group">
                    <label for="shelter_id">Refugio</label>
                    <select class="form-control" id="shelter_id" name="shelter_id">
                        <option value="">Ninguno</option>
                        @foreach($shelters as $shelter)
                            <option value="{{ $shelter->id }}" {{ $pet->shelter_id == $shelter->id ? 'selected' : '' }}>{{ $shelter->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $pet->description) }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="biography">Biografía</label>
            <textarea class="form-control" id="biography" name="biography" rows="3">{{ old('biography', $pet->biography) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Mascota</button>
        <a href="{{ route('pets.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection