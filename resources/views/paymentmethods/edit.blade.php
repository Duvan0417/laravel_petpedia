<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editar Método de Pago</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Editar Método de Pago</h1>
    <form action="{{ route('paymentmethods.update', $paymentMethod) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">Usuario:</label>
            <select class="form-control" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $paymentMethod->user_id ? 'selected' : '' }}>
                        {{ $user->name }} - {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control" name="type" value="{{ $paymentMethod->type }}" required>
        </div>
        <div class="form-group">
            <label for="details">Detalles:</label>
            <input type="text" class="form-control" name="details" value="{{ $paymentMethod->details }}" required>
        </div>
        <div class="form-group">
            <label for="issue_date">Fecha de Emisión:</label>
            <input type="date" class="form-control" name="issue_date" value="{{ $paymentMethod->issue_date }}" required>
        </div>
        <div class="form-group">
            <label for="CCV">CCV:</label>
            <input type="number" class="form-control" name="CCV" value="{{ $paymentMethod->CCV }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('paymentmethods.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
