<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Métodos de Pago</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Métodos de Pago</h1>
    <a href="{{ route('paymentmethods.create') }}" class="btn btn-primary mb-3">Agregar Método de Pago</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Detalles</th>
                <th>Fecha de Emisión</th>
                <th>CCV</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentMethods as $paymentMethod)
                <tr>
                    <td>{{ $paymentMethod->id }}</td>
                    <td>{{ $paymentMethod->user->name }}</td>
                    <td>{{ $paymentMethod->user->phone }}</td>
                    <td>{{ $paymentMethod->user->email }}</td>
                    <td>{{ $paymentMethod->type }}</td>
                    <td>{{ $paymentMethod->details }}</td>
                    <td>{{ $paymentMethod->issue_date }}</td>
                    <td>{{ $paymentMethod->CCV }}</td>
                    <td>
                        <a href="{{ route('paymentmethods.edit', $paymentMethod) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('paymentmethods.destroy', $paymentMethod) }}" method="POST" style="display:inline;">
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
