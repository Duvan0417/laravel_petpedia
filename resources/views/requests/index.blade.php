<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Lista de Solicitudes</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Lista de Solicitudes</h1>
    <a href="{{ route('requests.create') }}" class="btn btn-primary mb-3">Agregar Solicitud</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Usuario</th>
                <th>Nombre del Refugio</th>
                <th>Razón de la Cita</th>
                <th>Fecha</th>
                <th>Prioridad</th>
                <th>Estado de Solicitud</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->user->name }}</td>
                    <td>{{ $request->shelter->name }}</td>
                    <td>{{ $request->appointment->reason }}</td>
                    <td>{{ $request->date }}</td>
                    <td>{{ $request->priority }}</td>
                    <td>{{ $request->solicitation_status }}</td>
                    <td>
                        <a href="{{ route('requests.edit', $request) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('requests.destroy', $request) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
