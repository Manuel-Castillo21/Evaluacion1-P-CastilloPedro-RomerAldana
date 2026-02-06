<!DOCTYPE html>
<html>
<head>
    <title>Listado de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Estudiantes Registrados</h1>
    @forelse($estudiantes as $estudiante)
        @if ($loop->first)
            <table class="table table-bordered mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>Promedio</th>
                        <th>Edad</th>
                        <th>Fecha de Nacimiento</th>
                    </tr>
                </thead>
                <tbody>
        @endif
                    <tr>
                        <td>{{ $estudiante->id }}</td>
                        <td>{{ $estudiante->nombrecompleto }}</td>
                        <td>{{ $estudiante->promedio }}</td>
                        <td>{{ $estudiante->edad }}</td>
                        <td>{{ $estudiante->fechadenacimiento }}</td>
                    </tr>
        @if ($loop->last)
                </tbody>
            </table>
        @endif
    @empty
        <div class="alert alert-warning mt-4">
            <strong>No se encontraron registros en el sistema.</strong>
        </div>
    @endforelse
</body>
</html>