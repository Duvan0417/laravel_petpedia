<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editar Solicitud</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Editar Solicitud</h1>
    <form action="{{ route('requests.update', $requestModel) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">Usuario:</label>
            <select class="form-control" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $requestModel->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="shelter_id">Refugio:</label>
            <select class="form-control" name="shelter_id" required>
                @foreach ($shelters as $shelter)
                    <option value="{{ $shelter->id }}" {{ $shelter->id == $requestModel->shelter_id ? 'selected' : '' }}>{{ $shelter->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="appointment_id">Cita:</label>
            <select class="form-control" name="appointment_id" required>
                @foreach ($appointments as $appointment)
                    <option value="{{ $appointment->id }}" {{ $appointment->id == $requestModel->appointment_id ? 'selected' : '' }}>{{ $appointment->reason }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="datetime-local" class="form-control" name="date" value="{{ \Carbon\Carbon::parse($requestModel->date)->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="priority">Prioridad:</label>
            <input type="number" class="form-control" name="priority" value="{{ $requestModel->priority }}" required>
        </div>
        <div class="form-group">
            <label for="solicitation_status">Estado de Solicitud:</label>
            <input type="text" class="form-control" name="solicitation_status" value="{{ $requestModel->solicitation_status }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('requests.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
