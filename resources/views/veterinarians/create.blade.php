<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Veterinario</title>
    <style>
        label { display: block; margin-top: 10px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 4px; }
        button { margin-top: 15px; padding: 10px 15px; }
        .error { color: red; margin-top: 5px; }
    </style>
</head>
<body>
    <h1>Registrar Veterinario</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('veterinarians.store') }}" method="POST">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>

        <label for="address">Dirección:</label>
        <textarea name="address" id="address" required>{{ old('address') }}</textarea>

        <label for="phone">Teléfono:</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>

        <label for="hours">Horas de atención:</label>
        <input type="text" name="hours" id="hours" value="{{ old('hours') }}" required>

        <label for="services_offered">Servicios ofrecidos:</label>
        <textarea name="services_offered" id="services_offered" required>{{ old('services_offered') }}</textarea>

        <button type="submit">Registrar Veterinario</button>
    </form>
</body>
</html>
